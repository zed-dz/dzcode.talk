// models files for mongodb should be singular and start wit capital letter

const mongoose = require('mongoose')
// const Schema = mongoose.Schema
// const { Schema } = mongoose

// create schema => feilds ( user collection gonna have) name , email , pwd , avatar(gravatar) , date
const UserSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  },
  password: {
    type: String,
    required: true
  },
  avatar: {
    type: String
  },
  date: {
    type: Date,
    default: Date.now
  }
})
module.exports = User = mongoose.model('user', UserSchema)
