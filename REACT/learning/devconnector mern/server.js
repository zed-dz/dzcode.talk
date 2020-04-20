const express = require('express')
const path = require('path')
// const bodyParser = require('body-parser')
const ConnectDB = require('./config/db')
const errorHandler = require('./middleware/errorhandler')

// const passport = require('passport')
// passport config
// require('./middleware/passport')(passport)

const app = express()
app.use(express.json({extended: false}))
// midlleware errorHandler to use displayerrors function
app.use(errorHandler.displayErrors)

// body parser midlleware
// app.use(bodyParser.urlencoded({ extended: false }))
// app.use(bodyParser.json())

// passport midlleware
// app.use(passport.initialize())

// connect db
ConnectDB()

// app.get('/', (req, res) => res.send('Hello world'))

// use routes
app.use('/api/users', require('./routes/api/users'))
app.use('/api/posts', require('./routes/api/posts'))
app.use('/api/profile', require('./routes/api/profile'))
app.use('/api/auth', require('./routes/api/auth'))

// Serve static assets in production
if (process.env.NODE_ENV === 'production') {
  // Set static folder
  app.use(express.static('client/build'))

  app.get('*', (req, res) => {
    res.sendFile(path.resolve(__dirname, 'client', 'build', 'index.html'))
  })
}

errorHandler.unhandleRejection()

const port = process.env.PORT || 5000

app.listen(port, () => {
  console.log(`Server started on ${port}`)
})
