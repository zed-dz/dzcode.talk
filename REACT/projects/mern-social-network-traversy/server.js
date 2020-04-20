const express = require('express')
const path = require('path')
const bodyParser = require('body-parser')
const ConnectDB = require('./config/db')
const errorHandler = require('./middleware/errorhandler')

const app = express()

app.use(errorHandler.displayErrors)

app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())

// connect db
ConnectDB()

// use routes
app.use('/api/user', require('./routes/api/user'))
app.use('/api/posts', require('./routes/api/posts'))
app.use('/api/profile', require('./routes/api/profile'))

// Serve static assets in production
if (process.env.NODE_ENV === 'production') {
  // Set static folder
  app.use(express.static('client/build'))

  app.get('*', (req, res) => {
    res.sendFile(path.resolve(__dirname, 'client', 'build', 'landing.html'))
  })
}

errorHandler.unhandleRejection()

const port = process.env.PORT || 5000

app.listen(port, () => {
  console.log(`Server started on ${port}`)
})
