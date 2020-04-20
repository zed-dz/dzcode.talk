const eslintrc = require('./.eslintrc')
const jshintrc = require('./.jshintrc')
const prettierrc = require('./.prettierrc')
const babelrc = require('./.babelrc')
const keybindings = require('./keybindings.json')
const html = require('./html.json')
const css = require('./css.json')
const vscJs = require('./vsc_js_snippets.json')
const tslint = require('./tslint.json')
const editorconfig = require('./.editorconfig')
const env = require('./.env')
const hyper = require('./.hyper')
const jest = require('./jest.config')
const enzyme = require('./enzyme.config')

module.exports = {
  eslintrc,
  jshintrc,
  prettierrc,
  keybindings,
  html,
  css,
  vscJs,
  tslint,
  babelrc,
  editorconfig,
  env,
  hyper,
  jest,
  enzyme
}
