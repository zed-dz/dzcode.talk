const mongoose = require('mongoose')

const { Schema } = mongoose

const PostsSchema = new Schema({
  user: {
    type: Schema.Types.ObjectId,
    // reference to the users collection
    ref: 'users'
  },
  text: {
    type: String,
    required: true
  },
  name: {
    type: String
  },
  avatar: {
    type: String
  },

  // we can populate and grab the name avatar and other attributes from the profile model but we want new ones so that if the user delete his profile his posts wont be deleted in case of a valuable post
  likes: [
    {
      user: {
        type: Schema.Types.ObjectId,
        ref: 'users'
      }
    }
  ],
  comments: [
    {
      user: {
        type: Schema.Types.ObjectId,
        ref: 'users'
      },
      text: {
        type: String,
        required: true
      },
      name: {
        type: String
      },
      avatar: {
        type: String
      },
      date: {
        type: Date,
        default: Date.now
      }
    }
  ],
  date: {
    type: Date,
    default: Date.now
  }
})

module.exports = Posts = mongoose.model('posts', PostsSchema)
