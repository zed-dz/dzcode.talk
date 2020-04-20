const Validator = require('validator')
const isEmpty = require('./is-empty')

module.exports = function validatePostsInput(data) {
  const errors = {}

  data.text = !isEmpty(data.text) ? data.text : ''

  if (!Validator.isLength(data.text, { min: 10, max: 300 }))
    errors.text = 'post most be between 10 and 300 chars'

  if (Validator.isEmpty(data.text)) errors.text = 'text field is required'

  return {
    errors,
    isValid: isEmpty(errors)
  }
}
