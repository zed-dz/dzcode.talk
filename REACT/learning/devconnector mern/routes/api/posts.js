const express = require('express')
// const passport = require('passport')
const { check, validationResult } = require('express-validator/check')
const errorHandler = require('../../middleware/errorhandler')
const auth = require('../../middleware/auth')
// load input validation
// const validatePostsInput = require('../../validation/posts')

// load models
const Posts = require('../../models/Posts')
// const Profile = require('../../models/Profile')
const User = require('../../models/User')

const router = express.Router()

const createPost = async (req, res) => {
  // const { errors, isValid } = validatePostsInput(req.body)
  // if (!isValid) return res.status(400).json({ errors })
  const errors = validationResult(req)

  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  // const { text, name, avatar } = req.body
  // const newPost = new Posts({
  //   user: req.user.id,
  //   text,
  //   name,
  //   avatar
  // })
  const user = await User.findById(req.user.id).select('-password')
  const newPost = new Posts({
    user: req.user.id,
    text: req.body.text,
    name: user.name,
    avatar: user.avatar
  })
  const post = await newPost.save()
  res.json(post)
}
const getPosts = async (req, res) => {
  const posts = await Posts.find().sort({ date: -1 })
  // if (!posts) return res.status(404).json({ nopostsfound: 'no posts found' })
  if (!posts) return res.status(404).json({ msg: 'no posts found' })
  res.json(posts)
}

const getPostById = async (req, res) => {
  const post = await Posts.findById(req.params.id)
  if (!post) return res.status(404).json({ msg: 'no post found by id' })
  // return res.status(404).json({ nopostfound: 'no post found by id' })
  res.json(post)
}

const deletePost = async (req, res, next) => {
  const { user } = req
  const post = await Posts.findById(req.params.id)
  // check for posts
  if (!post)
    // return res.status(404).json({ nopostfound: 'there is no post to delete' })
    return res.status(404).json({ msg: 'there is no post to delete' })
  // const profile = await Profile.findOne({ user: user.id })
  // check for post owner
  // when i do profile.user it works
  if (post.user.toString() !== user.id) {
    return res.status(401).json({ msg: 'User not authorized' })
    // const err = new Error('User not authorized')
    // err.status = 401
    // return next(err)
  }

  // delete
  await post.remove()
  res.json({ msg: 'post removed' })
}
const likePost = async (req, res) => {
  const post = await Posts.findById(req.params.id)
  // if the id of the user is already in the likes array id than its already liked
  const userExist = post.likes.filter(
    like => like.user.toString() === req.user.id
  )
  if (userExist.length > 0)
    // return res
    //   .status(400)
    //   .json({ alreadyliked: 'user already liked this post' })
    return res.status(400).json({ msg: 'user already liked this post' })
  // add user to the liked array
  post.likes.unshift({ user: req.user.id })
  await post.save()
  res.json(post.likes)
}
const unlikePost = async (req, res) => {
  const post = await Posts.findById(req.params.id)
  const userExist = post.likes.filter(
    like => like.user.toString() === req.user.id
  )
  if (userExist.length === 0)
    return res.status(400).json({ msg: 'user didnt like this post yet' })
  // return res.status(400).json({ notliked: 'user didnt like this post yet' })
  // get remove index
  const removeIndex = post.likes
    .map(item => item.user.toString())
    .indexOf(req.user.id)
  // splice out the array
  post.likes.splice(removeIndex, 1)
  await post.save()
  res.json(post.likes)
}
const createComment = async (req, res, next) => {
  // the validator is returning isValid with capital V so when you call it dont use another name
  // const { errors, isValid } = validatePostsInput(req.body)
  // if (!isValid) return res.status(400).json({ errors })
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })
  const user = await User.findById(req.user.id).select('-password')
  const posts = await Posts.findById(req.params.id)

  // return res.status(404).json({ nopostfound: 'no post found to comment on' })
  const newComments = {
    user: req.user.id,
    text: req.body.text,
    name: user.name,
    avatar: user.avatar
  }
  posts.comments.unshift(newComments)
  await posts.save()
  res.json(posts.comments)
}

const deleteComment = async (req, res) => {
  const posts = await Posts.findById(req.params.id)

  // Pull out comment
  const comment = posts.comments.filter(
    comment => comment.id === req.params.comment_id
  )
  // const commentExist = posts.comments.filter(
  //   comment => comment._id.toString() === req.params.comment_id
  // )
  if (!comment) return res.status(404).json({ msg: 'comment does not exist' })
  // if (commentExist.length === 0)
  //   return res.status(404).json({ nocomment: 'no comment found' })
  if (comment.user.toString() !== req.user.id)
    return res.status(401).json({ msg: 'user not authorized' })
  // delete comment
  const commentIndex = posts.comments
    .map(item => item.id)
    .indexOf(req.params.comment_id)
  // const commentIndex = posts.comments
  //   .map(item => item._id.toString())
  //   .indexOf(req.params.comment_id)

  posts.comments.splice(commentIndex, 1)
  await posts.save()
  res.json(posts.comments)
}
// root (/) == /api/posts/

// @route     GET api/posts/test
// @desc      tests post route
// @access    public
// router.get('/test', (req, res) => res.json({ msg: 'posts Works' }))

// @route     POST api/posts
// @desc      Create post
// @access    Private

// router.post(
//   '/',
//   passport.authenticate('jwt', { session: false }),
//   errorHandler.handleExpressErrors(createPost)
// )
router.post(
  '/',
  [
    auth,
    [
      check('text', 'Text is required')
        .not()
        .isEmpty()
    ]
  ],
  errorHandler.handleExpressErrors(createPost)
)
// @route     DELETE api/posts/:id
// @desc      Delete post by id
// @access    Private

router.delete('/:id', auth, errorHandler.handleExpressErrors(deletePost))

// @route     GET api/posts/:id
// @desc      Get post by id
// @access    Private

router.get('/:id', auth, errorHandler.handleExpressErrors(getPostById))

// @route     GET api/posts
// @desc      Get all posts
// @access    Private

router.get('/', auth, errorHandler.handleExpressErrors(getPosts))

// @route     POST api/posts/like/:id
// @desc      like a post
// @access    Private

router.post('/like/:id', auth, errorHandler.handleExpressErrors(likePost))

// @route     POST api/posts/like/:id
// @desc      unlike a post
// @access    Private

router.post('/unlike/:id', auth, errorHandler.handleExpressErrors(unlikePost))

// @route     POST api/posts/comment/:id
// @desc      post a comment
// @access    Private

router.post(
  '/comment/:id',
  [
    auth,
    [
      check('text', 'Text is required')
        .not()
        .isEmpty()
    ]
  ],
  errorHandler.handleExpressErrors(createComment)
)

// @route     DELETE api/posts/comment/:id/:comment_id
// @desc      delete a comment
// @access    Private

router.delete(
  '/comment/:id/:comment_id',
  auth,
  errorHandler.handleExpressErrors(deleteComment)
)

module.exports = router
