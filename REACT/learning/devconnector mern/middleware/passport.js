const JwtStrategy = require('passport-jwt').Strategy
const extractJwt = require('passport-jwt').ExtractJwt
// const mongoose = require('mongoose')
const User = require('../models/User')
const secretOrKey = require('../config/keys')
const errorHandler = require('./errorhandler')

const opts = {}
opts.jwtFromRequest = extractJwt.fromAuthHeaderAsBearerToken()
opts.secretOrKey = secretOrKey

const passportVerif = async passport => {
  await passport.use(
    new JwtStrategy(opts, async (jwtPayload, done) => {
      const user = await User.findById(jwtPayload.id)
      // .then(user => {
      if (user) {
        // done(err, user) while err is null
        return done(null, user)
      }
      // no error and no user
      return done(null, false)
    })
  )
}

const safeVerif = errorHandler.handleFunctionErrors(passportVerif)
module.exports = safeVerif

/*
module.exports = passport => {
     passport.use(
      new JwtStrategy(opts, async (jwtPayload, done) => {
        User.findById(jwtPayload.id).then(user => {
        if (user) {
          // done(err, user) while err is null
          return done(null, user)
        }
        // no error and no user
        return done(null, false)
      })
    )
    })
      .catch(err => console.error(err.message))
}
*/
