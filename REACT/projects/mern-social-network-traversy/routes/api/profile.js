const express = require('express')
const request = require('request')
const config = require('config')
const { check, validationResult } = require('express-validator/check')
const auth = require('../../middleware/auth')

// load profile model
const Profile = require('../../models/Profile')
const Posts = require('../../models/Posts')
const User = require('../../models/User')
// load error handler
const errorHandler = require('../../middleware/errorhandler')

const router = express.Router()

const getProfile = async (req, res, next) => {
  const profile = await Profile.findOne({ user: req.user.id }).populate(
    'user',
    ['name', 'email', 'avatar']
  )
  if (!profile)
    return res.status(400).json({ msg: 'There is no profile for this user' })

  res.json(profile)
}
const getAllProfile = async (req, res, next) => {
  const profiles = await Profile.find().populate('user', [
    'name',
    'email',
    'avatar'
  ])
  res.json(profiles)
}

const getProfileById = async (req, res, next) => {
  const profile = await Profile.findOne({
    user: req.params.user_id
  }).populate('user', ['name', 'email', 'avatar'])

  if (!profile) return res.status(400).json({ msg: 'Profile not found' })

  res.json(profile)
}

const createProfile = async (profileFields, req, res) => {
  let profile = await Profile.findOne({ user: req.user.id })

  if (profile) {
    // Update
    profile = await Profile.findOneAndUpdate(
      { user: req.user.id },
      { $set: profileFields },
      { new: true }
    )
    return res.json(profile)
  }
  // Create
  profile = new Profile(profileFields)
  await profile.save()
  res.json(profile)
}

const postProfile = async (req, res) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const profileFields = {}
  const {
    company,
    website,
    location,
    bio,
    status,
    githubusername,
    skills,
    youtube,
    twitter,
    facebook,
    linkedin,
    instagram
  } = req.body

  profileFields.user = req.user.id
  if (company) profileFields.company = company
  if (website) profileFields.website = website
  if (location) profileFields.location = location
  if (bio) profileFields.bio = bio
  if (status) profileFields.status = status
  if (githubusername) profileFields.githubusername = githubusername
  if (typeof skills !== 'undefined') {
    profileFields.skills = skills.split(',').map(skill => skill.trim())
  }
  profileFields.social = {}

  if (youtube) profileFields.social.youtube = youtube
  if (twitter) profileFields.social.twitter = twitter
  if (facebook) profileFields.social.facebook = facebook
  if (linkedin) profileFields.social.linkedin = linkedin
  if (instagram) profileFields.social.instagram = instagram

  createProfile(profileFields, req, res)
}
const postExperience = async (req, res, next) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const { title, company, location, from, to, current, description } = req.body
  const newExp = {
    title,
    company,
    location,
    from,
    to,
    current,
    description
  }
  const profile = await Profile.findOne({ user: req.user.id })
  profile.experience.unshift(newExp)
  await profile.save()
  res.json(profile.experience)
}

const postEducation = async (req, res, next) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const {
    school,
    degree,
    fieldofstudy,
    from,
    to,
    current,
    description
  } = req.body
  const newEdu = {
    school,
    degree,
    fieldofstudy,
    from,
    to,
    current,
    description
  }
  const profile = await Profile.findOne({ user: req.user.id })
  profile.education.unshift(newEdu)
  await profile.save()
  res.json(profile.education)
}

const deleteExperience = async (req, res, next) => {
  const profile = await Profile.findOne({ user: req.user.id })
  const removeIndex = profile.experience
    .map(item => item.id)
    .indexOf(req.params.exp_id)
  profile.experience.splice(removeIndex, 1)
  await profile.save()
  res.json(profile)
}

const deleteEducation = async (req, res, next) => {
  const profile = await Profile.findOne({ user: req.user.id })
  const removeIndex = profile.education
    .map(item => item.id)
    .indexOf(req.params.edu_id)
  profile.education.splice(removeIndex, 1)
  await profile.save()
  res.json(profile)
}

const deleteUser = async (req, res, next) => {
  const { user } = req
  await Profile.findOneAndDelete({ user: user.id })
  await Posts.findOneAndDelete({ user: user.id })
  await User.findOneAndDelete({ _id: user.id })
  res.json({ msg: 'User deleted' })
}
const getGithub = (req, res) => {
  const options = {
    uri: `https://api.github.com/users/${
      req.params.username
    }/repos?per_page=5&sort=created:asc&client_id=${config.get(
      'githubClientId'
    )}&client_secret=${config.get('githubSecret')}`,
    method: 'GET',
    headers: { 'user-agent': 'node.js' }
  }

  request(options, (error, response, body) => {
    if (error) console.error(error)

    if (response.statusCode !== 200) {
      return res.status(404).json({ msg: 'No Github profile found' })
    }
    res.json(JSON.parse(body))
  })
}

// @route     POST api/profile
// @desc      create or edit user profile
// @access    private

router.post(
  '/',
  [
    auth,
    [
      check('status', 'Status is required')
        .not()
        .isEmpty(),
      check('skills', 'Skills is required')
        .not()
        .isEmpty()
    ]
  ],
  errorHandler.handleExpressErrors(postProfile)
)

// @route     GET api/profile/me
// @desc      get current user profile
// @access    private

router.get('/me', auth, errorHandler.handleExpressErrors(getProfile))

// @route     GET api/profile
// @desc      get all profile
// @access    Publix

router.get('/all', errorHandler.handleExpressErrors(getAllProfile))

// @route    GET api/profile/user/:user_id
// @desc     Get profile by user ID
// @access   Public
router.get('/user/:user_id', errorHandler.handleExpressErrors(getProfileById))

// @route     PUT api/profile/experience
// @desc      add user experience
// @access    private

router.put(
  '/experience',
  [
    auth,
    [
      check('title', 'Title is required')
        .not()
        .isEmpty(),
      check('company', 'Company is required')
        .not()
        .isEmpty(),
      check('from', 'From date is required')
        .not()
        .isEmpty()
    ]
  ],
  errorHandler.handleExpressErrors(postExperience)
)

// @route     PUT api/profile/education
// @desc      Add user education
// @access    private

router.put(
  '/education',
  [
    auth,
    [
      check('school', 'School is required')
        .not()
        .isEmpty(),
      check('degree', 'Degree is required')
        .not()
        .isEmpty(),
      check('fieldofstudy', 'Field of study is required')
        .not()
        .isEmpty(),
      check('from', 'From date is required')
        .not()
        .isEmpty()
    ]
  ],
  errorHandler.handleExpressErrors(postEducation)
)

// @route     DELETE api/profile/experience
// @desc      delete user experience
// @access    private

router.delete(
  '/experience/:exp_id',
  auth,
  errorHandler.handleExpressErrors(deleteExperience)
)
// @route     DELETE api/profile/education
// @desc      delete user education
// @access    private

router.delete(
  '/education/:edu_id',
  auth,
  errorHandler.handleExpressErrors(deleteEducation)
)

// @route     DELETE api/profile
// @desc      delete user and profile and posts
// @access    private

router.delete('/', auth, errorHandler.handleExpressErrors(deleteUser))

// @route    GET api/profile/github/:username
// @desc     Get user repos from Github
// @access   Public
router.get('/github/:username', errorHandler.handleExpressErrors(getGithub))

module.exports = router
