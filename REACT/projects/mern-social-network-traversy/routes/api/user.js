const express = require('express')
const gravatar = require('gravatar')
const bcrypt = require('bcryptjs')
const jwt = require('jsonwebtoken')
const config = require('config')
const { check, validationResult } = require('express-validator/check')
const auth = require('../../middleware/auth')

const errorHandler = require('../../middleware/errorhandler')

const User = require('../../models/User')

const router = express.Router()

const getUser = async (req, res) => {
  // we send the name, email, id and everything but the password
  const user = await User.findById(req.user.id).select('-password')
  res.json(user)
}

const registerUsers = async (req, res) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const { name, email, password } = req.body
  // if (password !== password2) {
  //   // return res.status(400).json({ errors: 'password do not match' })
  //   throw new Error('password do not match')
  // }
  let user = await User.findOne({ email })

  if (user)
    return res.status(400).json({ errors: [{ msg: 'User already exists' }] })

  const avatar = gravatar.url(email, {
    s: '200',
    r: 'pg',
    d: 'mm'
  })
  user = new User({
    name,
    email,
    avatar,
    password
  })

  const salt = await bcrypt.genSalt(10)
  user.password = await bcrypt.hash(password, salt)
  await user.save()

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
}
const authenticateUser = async (req, res) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const { email, password } = req.body

  const user = await User.findOne({ email })

  if (!user)
    return res.status(400).json({ errors: [{ msg: 'Invalid credentials' }] })

  const isMatch = await bcrypt.compare(password, user.password)

  if (!isMatch)
    return res.status(400).json({ errors: [{ msg: 'Password Incorrect' }] })

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
}

// @route    GET api/user
// @desc     get user info
// @access   Private

router.get('/', auth, errorHandler.handleExpressErrors(getUser))

// @route    POST api/user/auth
// @desc     Authenticate user & get token
// @access   Public
router.post(
  '/auth',
  [
    check('email', 'Please include a valid email').isEmail(),
    check('password', 'Password is required').exists()
  ],
  errorHandler.handleExpressErrors(authenticateUser)
)

// @route     POST api/user/register
// @desc      Register user & get token
// @access    public
router.post(
  '/register',
  [
    check('name', 'name is required')
      .not()
      .isEmpty(),
    check('email', 'Please include a valid email').isEmail(),
    check(
      'password',
      'Please enter a password with 6 or more characters'
    ).isLength({ min: 6 })
    // .custom((value, { req }) => {
    //   if (value !== req.body.password2) {
    //     console.log(`${value}  ${req.body.password2}`)
    //     // trow error if passwords do not match
    //     throw new Error("Passwords don't match")
    //   } else {
    //     return value
    //   }
    // })
  ],
  errorHandler.handleExpressErrors(registerUsers)
)

module.exports = router
