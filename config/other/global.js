/*******************************************************************************
* $Id: npm-setup.js 12785 2016-01-29 16:34:49Z sthames $
* ==============================================================================
* Parameters: 'links' - Create links in local environment, optional.
*
* <p>NodeJS script to install common development environment packages in global
* environment. <c>packages</c> object contains list of packages to install.</p>
*
* <p>Including 'links' creates links in local environment to global packages.</p>
*
* <p><b>npm ls -g --json</b> command is run to provide the current list of
* global packages for comparison to required packages. Packages are installed
* only if not installed. If the package is installed but is not the required
* package version, the existing package is removed and the required package is
* installed.</p>.
*
* <p>When provided as a "preinstall" script in a "package.json" file, the "npm
* install" command calls this to verify global dependencies are installed.</p>
*******************************************************************************/
var exec = require('child_process').exec;
var fs = require('fs');
var path = require('path');

/*---------------------------------------------------------------*/
/* List of packages to install and 'from' value to pass to 'npm  */
/* install'. Value must match the 'from' field in 'npm ls -json' */
/* so this script will recognize a package is already installed. */
/*---------------------------------------------------------------*/
var packages =
{
  "@typescript-eslint/parser": "^1.6.0",
  "@typescript-eslint/eslint-plugin": "^1.6.0",
  "axios": "^0.18.0",
  "ci": "^1.0.0",
  "composer": "^4.1.0",
  "mysql": "^2.16.0",
  "npm-check-updates": "^3.1.4",
  "npx": "^10.2.0",
  "sass": "^1.17.4",
  "uglify-js": "^3.5.3",
  "yarn": "^1.15.2",
  "@babel/core": "^7.4.3",
  "@babel/plugin-proposal-class-properties": "^7.4.0",
  "@babel/plugin-proposal-export-namespace-from": "^7.2.0",
  "@babel/plugin-proposal-throw-expressions": "^7.2.0",
  "@babel/plugin-syntax-dynamic-import": "^7.2.0",
  "@babel/polyfill": "^7.4.3",
  "@babel/preset-env": "^7.4.3",
  "@babel/preset-react": "^7.0.0",
  "babel-core": "^7.0.0-bridge.0",
  "babel-eslint": "^10.0.1",
  "babel-jest": "^24.7.1",
  "babel-loader": "^8.0.5",
  "copy-webpack-plugin": "^5.0.2",
  "css-loader": "^2.1.1",
  "enzyme": "^3.9.0",
  "enzyme-adapter-react-16": "^1.11.2",
  "eslint": "^5.16.0",
  "eslint-config-airbnb": "^17.1.0",
  "eslint-config-airbnb-base": "^13.1.0",
  "eslint-config-jest-enzyme": "^7.0.2",
  "eslint-config-prettier": "^4.1.0",
  "eslint-config-standard": "^12.0.0",
  "eslint-config-standard-jsx": "^6.0.2",
  "eslint-import-resolver-node": "^0.3.2",
  "eslint-loader": "^2.1.2",
  "eslint-module-utils": "^2.3.0",
  "eslint-plugin-babel": "^5.3.0",
  "eslint-plugin-flowtype": "^3.5.1",
  "eslint-plugin-import": "^2.16.0",
  "eslint-plugin-jest": "^22.4.1",
  "eslint-plugin-jsx-a11y": "^6.2.1",
  "eslint-plugin-node": "^8.0.1",
  "eslint-plugin-prettier": "^3.0.1",
  "eslint-plugin-promise": "^4.1.1",
  "eslint-plugin-react": "^7.12.4",
  "eslint-plugin-standard": "^4.0.0",
  "eslint-restricted-globals": "^0.2.0",
  "eslint-scope": "^4.0.3",
  "eslint-utils": "^1.3.1",
  "eslint-visitor-keys": "^1.0.0",
  "font-awesome": "^4.7.0",
  "gh-pages": "^2.0.1",
  "gulp": "^4.0.0",
  "gulp-cli": "^2.1.0",
  "gulp-sass": "^4.0.2",
  "gulp-uglifycss": "^1.1.0",
  "html-webpack-plugin": "^3.2.0",
  "jshint": "^2.10.2",
  "lint-staged": "^8.1.5",
  "live-server": "^1.2.1",
  "mini-css-extract-plugin": "^0.5.0",
  "ngrok": "^3.1.1",
  "node-gyp": "^3.8.0",
  "node-libs-browser": "^2.2.0",
  "node-sass": "^4.11.0",
  "npm": "^6.9.0",
  "npm-collect": "^1.0.5",
  "npm-run-all": "^4.1.5",
  "npm-run-path": "^3.1.0",
  "npmlog": "^4.1.2",
  "optimize-css-assets-webpack-plugin": "^5.0.1",
  "package-json": "^6.3.0",
  "prettier": "^1.16.4",
  "prettier-eslint": "^8.8.2",
  "prettier-eslint-cli": "^4.7.1",
  "prettier-stylelint": "^0.4.2",
  "purgecss-webpack-plugin": "^1.4.0",
  "sass-loader": "^7.1.0",
  "style-loader": "^0.23.1",
  "typescript": "^3.4.1",
  "uglifyjs-webpack-plugin": "^2.1.2",
  "validate-npm-package-license": "^3.0.4",
  "webpack": "^4.29.6",
  "webpack-cli": "^3.3.0",
  "webpack-dev-server": "^3.2.1",
  "webpack-merge": "^4.2.1",
  "webpack-visualizer-plugin": "^0.1.11",

  /*---------------------------------------------------------------*/
  /* fork of 0.2.14 allows passing parameters to main-bower-files. */
  /*---------------------------------------------------------------*/
  "bower-main": "git+https://github.com/Pyo25/bower-main.git"
}

/*******************************************************************************
* run */
/**
* Executes <c>cmd</c> in the shell and calls <c>cb</c> on success. Error aborts.
*
* Note: Error code -4082 is EBUSY error which is sometimes thrown by npm for
* reasons unknown. Possibly this is due to antivirus program scanning the file
* but it sometimes happens in cases where an antivirus program does not explain
* it. The error generally will not happen a second time so this method will call
* itself to try the command again if the EBUSY error occurs.
*
* @param  cmd  Command to execute.
* @param  cb   Method to call on success. Text returned from stdout is input.
*******************************************************************************/
var run = function (cmd, cb) {
  /*---------------------------------------------*/
  /* Increase the maxBuffer to 10MB for commands */
  /* with a lot of output. This is not necessary */
  /* with spawn but it has other issues.         */
  /*---------------------------------------------*/
  exec(cmd, { maxBuffer: 1000 * 1024 }, function (err, stdout) {
    if (!err) cb(stdout);
    else if (err.code | 0 == -4082) run(cmd, cb);
    else throw err;
  });
};

/*******************************************************************************
* runCommand */
/**
* Logs the command and calls <c>run</c>.
*******************************************************************************/
var runCommand = function (cmd, cb) {
  console.log(cmd);
  run(cmd, cb);
}

/*******************************************************************************
* Main line
*******************************************************************************/
var doLinks = (process.argv[2] || "").toLowerCase() == 'links';
var names = Object.keys(packages);
var name;
var installed;
var links;

/*------------------------------------------*/
/* Get the list of installed packages for   */
/* version comparison and install packages. */
/*------------------------------------------*/
console.log('Configuring global Node environment...')
run('npm ls -g --json', function (stdout) {
  installed = JSON.parse(stdout).dependencies || {};
  doWhile();
});

/*--------------------------------------------*/
/* Start of asynchronous package installation */
/* loop. Do until all packages installed.     */
/*--------------------------------------------*/
var doWhile = function () {
  if (name = names.shift())
    doWhile0();
}

var doWhile0 = function () {
  /*----------------------------------------------*/
  /* Installed package specification comes from   */
  /* 'from' field of installed packages. Required */
  /* specification comes from the packages list.  */
  /*----------------------------------------------*/
  var current = (installed[name] || {}).from;
  var required = packages[name];

  /*---------------------------------------*/
  /* Install the package if not installed. */
  /*---------------------------------------*/
  if (!current)
    runCommand('npm install -g ' + required, doWhile1);

  /*------------------------------------*/
  /* If the installed version does not  */
  /* match, uninstall and then install. */
  /*------------------------------------*/
  else if (current != required) {
    delete installed[name];
    runCommand('npm remove -g ' + name, function () {
      runCommand('npm remove ' + name, doWhile0);
    });
  }

  /*------------------------------------*/
  /* Skip package if already installed. */
  /*------------------------------------*/
  else
    doWhile1();
};

var doWhile1 = function () {
  /*-------------------------------------------------------*/
  /* Create link to global package from local environment. */
  /*-------------------------------------------------------*/
  if (doLinks && !fs.existsSync(path.join('node_modules', name)))
    runCommand('npm link ' + name, doWhile);
  else
    doWhile();
};
