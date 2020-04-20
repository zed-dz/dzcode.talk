const mongoose = require('mongoose')
const config = require('config')

// const db = require('./config/keys').mongoURI
const db = config.get('mongoURI')
// Connect to MongoDB
const connectDB = async () => {
  try {
    await mongoose.connect(db, {
      useNewUrlParser: true,
      useFindAndModify: false
    })
    console.log('mongoDB connected!..')
  } catch (err) {
    console.error(err.message)
    // exit process with failure
    process.exit(1)
  }
}

// mongoose
//   .connect(db)
//   .then(() => console.log('mongoDB Connected'))
//   .catch(err => console.log(err))

module.exports = connectDB
