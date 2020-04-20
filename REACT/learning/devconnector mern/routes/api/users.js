const express = require('express')
const gravatar = require('gravatar')
const bcrypt = require('bcryptjs')
// !! refactor thsi to auth
const jwt = require('jsonwebtoken')
// const passport = require('passport')
const config = require('config')
const { check, validationResult } = require('express-validator/check')
const auth = require('../../middleware/auth')

// const secretOrKey = require('../../config/keys')

const errorHandler = require('../../middleware/errorhandler')
// load input validation
// const validateRegisterInput = require('../../validation/register')
// const validateLoginInput = require('../../validation/login')

// load user model
const User = require('../../models/User')

const router = express.Router()
// @route     GET api/users/test
// @desc      tests user route
// @access    public

// root (/) == /api/users/
// router.get('/test', (req, res) => res.json({ msg: 'Users Works' }))

const encryptPwd = async newUser => {
  // await bcrypt.genSalt(10, async (err, salt) => {
  //   // hash
  //   newUser.password = await bcrypt.hash(newUser.password, salt)
  //   newUser.save()
  //   res.json(newUser)
  // })
  const salt = await bcrypt.genSalt(10)
  newUser.password = await bcrypt.hash(newUser.password, salt)
  await newUser.save()
}
// if you add 'next' as a param you cant add wit it the 'error' param bcz it becomes a midlleware errorhandling function so you have to add a block of try catch(error)
const registerUsers = async (req, res) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) {
    return res.status(400).json({ errors: errors.array() })
  }
  const { name, email, password } = req.body
  const user = await User.findOne({ email })

  /*
  if (password === '' || email === '' || name === '')
  // a specific error with expresshandleErrors func
  throw Error('Empty Input')
  // next('empty input')
  */

  // if (!isValid) {
  //   // 400 http for validation stuff error
  //   errors.status = 400
  //   return next(errors)
  // }
  // check validation & find if the email is not used with mongoose
  if (user) {
    // global error with the midlleware error function

    // const err = new Error('User email Already Exists')
    // err.status = 400
    // return next(err)

    // return res.status(400).json({ email: 'email already exists' })
    // return res.status(400).json({ errors })

    // errors.email = 'email already exists'
    // errors.status = 400
    // return next(errors)

    return res.status(400).json({ errors: [{ msg: 'User already exists' }] })
  }
  // to create an image avatar for when the user dosent create an icon like a default blank avatar image
  const avatar = gravatar.url(email, {
    s: '200',
    r: 'pg',
    d: 'mm'
  })
  const newUser = new User({
    name,
    email,
    avatar,
    password
  })
  encryptPwd(newUser)
  const payload = {
    user: {
      id: user.id
    }
  }

  jwt.sign(
    payload,
    config.get('jwtSecret'),
    { expiresIn: 360000 },
    (err, token) => {
      if (err) throw err
      res.json({ token })
    }
  )
  // next() // no errors happened w go to the next route => this will set up the headers which we already did so it will bring up an error
}

// registerUsers().catch(e => console.error(e))
/*
const loginUsers = async (req, res, next) => {
  const { email, password } = req.body
  const { errors, isValid } = validateLoginInput(req.body)

  const user = await User.findOne({ email })

  if (!isValid) {
    errors.status = 400
    return next(errors)
  }
  if (!user) {
    // return res.status(404).json({ email: 'user not found' })

    // const err = new Error('User Not Found')
    // err.status = 404
    // return next(err)

    errors.email = 'User Not Found'
    errors.status = 404
    return next(errors)
  }
  // user matched
  const isMatch = await bcrypt.compare(password, user.password)
  // create jwt payload
  const payload = { id: user.id, name: user.name, avatar: user.avatar }
  if (!isMatch) {
    // return res.status(400).json({ password: 'Password incorrect' })
    errors.password = 'password inccorect'
    errors.status = 400
    return next(errors)
  }
  // sign token
  const token = await jwt.sign(payload, secretOrKey, { expiresIn: 3600 })
  res.json({ sucess: true, token: `Bearer ${token}` })
}
*/
const currentUser = async (req, res) => {
  const { user } = req
  res.json({
    id: user.id,
    name: user.name,
    email: user.email
  })
}

// @route     POST api/users/register
// @desc      Register user
// @access    public
router.post(
  '/register',
  [
    check('name', 'Name is required')
      .not()
      .isEmpty(),
    check('email', 'Please include a valid email').isEmail(),
    check(
      'password',
      'Please enter a password with 6 or more characters'
    ).isLength({ min: 6 })
  ],
  errorHandler.handleExpressErrors(registerUsers)
)
// @route     POST api/users/login
// @desc      login user / returning JWT token
// @access    public

// router.post('/login', errorHandler.handleExpressErrors(loginUsers))

// @route     GET api/users/current
// @desc      return current user
// @access    private
router.get('/current', auth, errorHandler.handleExpressErrors(currentUser))

module.exports = router

// const arr = []
// const final = async () => {
//   await Promise.all(
//     arr.map(async () => {
//       try {
//         router.post(
//           '/register',
//           errorHandler.handleExpressErrors(registerUsers)
//         )
//         router.post('/login', errorHandler.handleExpressErrors(loginUsers))
//         router.get(
//           '/current',
//           passport.authenticate('jwt', { session: false }),
//           errorHandler.handleExpressErrors(currentUser)
//         )
//       } catch (err) {
//         throw Error(err)
//       }
//     })
//   )
// }
// final()

// const final = async () => {
//   await Promise.all([
//     router.post('/register', errorHandler.handleExpressErrors(registerUsers)),
//     router.post('/login', errorHandler.handleExpressErrors(loginUsers)),
//     router.get(
//       '/current',
//       passport.authenticate('jwt', { session: false }),
//       errorHandler.handleExpressErrors(currentUser)
//     )
//   ])
// }
// final()

/*
const getItems = async (arr, finder) => {
  const foundItems = await Promise.all(
    arr.map(({ _id }) => finder.findOne({ _id }))
  );
  return foundItems.filter(Boolean);
};

async (req, res) => {
  const [donations, events, teams] = await Promise.all([
    getItems(req.user.donations, Donation),
    getItems(req.user.events, Event),
    getItems(req.user.teams, Team),
  ])
    .catch(err => console.log(err));
  return res.status(200).json({ data: { donations, events, teams } });
};
*/
