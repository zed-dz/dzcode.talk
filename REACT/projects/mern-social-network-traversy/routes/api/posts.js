const express = require('express')
const { check, validationResult } = require('express-validator/check')

const auth = require('../../middleware/auth')
const errorHandler = require('../../middleware/errorhandler')

const Posts = require('../../models/Posts')
const User = require('../../models/User')

const router = express.Router()

const createPost = async (req, res) => {
  const errors = validationResult(req)

  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })

  const user = await User.findById(req.user.id).select('-password')
  // you cant change the user name from his post
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
  if (!posts) return res.status(404).json({ msg: 'no posts found' })
  res.json(posts)
}

const getPostById = async (req, res) => {
  const post = await Posts.findById(req.params.id)
  if (!post) return res.status(404).json({ msg: 'no post found by id' })
  res.json(post)
}

const deletePost = async (req, res, next) => {
  const { user } = req
  const post = await Posts.findById(req.params.id)

  if (!post) return res.status(404).json({ msg: 'there is no post to delete' })

  if (post.user.toString() !== user.id)
    return res.status(401).json({ msg: 'User not authorized' })

  await post.remove()
  res.json({ msg: 'post removed' })
}
const likePost = async (req, res) => {
  const post = await Posts.findById(req.params.id)
  const userExist = post.likes.filter(
    like => like.user.toString() === req.user.id
  )
  if (userExist.length > 0)
    return res.status(400).json({ msg: 'user already liked this post' })

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

  const removeIndex = post.likes
    .map(item => item.user.toString())
    .indexOf(req.user.id)

  post.likes.splice(removeIndex, 1)
  await post.save()
  res.json(post)
}
const createComment = async (req, res, next) => {
  const errors = validationResult(req)
  if (!errors.isEmpty()) return res.status(400).json({ errors: errors.array() })
  const user = await User.findById(req.user.id).select('-password')
  const posts = await Posts.findById(req.params.id)

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

  const comment = posts.comments.filter(
    comment => comment.id === req.params.comment_id
  )
  if (!comment) return res.status(404).json({ msg: 'comment does not exist' })
  // check user
  const commentString = comment.map(item => item.user).toString()

  if (commentString !== req.user.id)
    return res.status(401).json({ msg: 'user not authorized' })

  const commentIndex = posts.comments
    .map(item => item.id)
    .indexOf(req.params.comment_id)

  posts.comments.splice(commentIndex, 1)
  await posts.save()
  res.json(posts)
}

// @route     POST api/posts
// @desc      Create post
// @access    Private

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
