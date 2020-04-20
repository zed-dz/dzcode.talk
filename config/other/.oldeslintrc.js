// @ts-nocheck

const path = require("path");

module.exports = {
  //     "env": {
  //         "browser": true
  //     },
  //     "extends": "eslint:recommended",
  //     "parserOptions": {
  //         "ecmaVersion": 5
  //     },
  //     "rules": {
  //         "indent": [
  //             "error",
  //             "tab"
  //         ],
  //         "linebreak-style": [
  //             "error",
  //             "unix"
  //         ],
  //         "quotes": [
  //             "error",
  //             "double"
  //         ],
  //         "semi": [
  //             "error",
  //             "always"
  //         ]
  //     }
  // };
  //{
  extends: [
    "eslint:recommended",
    "airbnb",
    "prettier",
    "prettier/react",
    "standard",
    "plugin:prettier/recommended",
    "plugin:flowtype/recommended",
    "plugin:react/recommended",
    "prettier/flowtype",
    "prettier/standard",
    "plugin:jsx-a11y/recommended",
    "jest-enzyme",
    "plugin:jest/recommended",
    "typescript",
    "typescript/react",
    "typescript/prettier",
    // "tslint-react",
    // "tslint-eslint-rules",
    // "tslint-config-prettier",
    // "plugin:tslint/recommended",
    // "plugin:tslint/latest"
  ],
  parser: "babel-eslint",
  parserOptions: {
    // ecmaVersion: 8,
    ecmaVersion: 10,
    sourceType: "module",
    ecmaFeatures: {
      experimentalObjectRestSpread: true,
      impliedStrict: true,
      classes: true,
      jsx: true,
    },
  },
  // settings: {
  // 	"import/resolver": {
  // 		webpack: {
  // 			config: path.join(__dirname, "config", "webpack.base.config.js"),
  // 		},
  // 	},
  // },
  env: {
    browser: true,
    node: true,
    jquery: true,
    jest: true,
    es6: true,
  },
  rules: {
    // "no-debugger": 0,
    // "no-alert": 0,
    "no-unused-vars": [
      1,
      {
        argsIgnorePattern: "res|next|^err",
      },
    ],
    "prefer-const": [
      "error",
      {
        destructuring: "all",
      },
    ],
    "arrow-body-style": [2, "as-needed"],
    "no-unused-expressions": [
      2,
      {
        allowTaggedTemplates: true,
      },
    ],
    // "no-param-reassign": [
    //   2,
    //   {
    //     props: false,
    //   },
    // ],
    // "no-console": 0,
    "import/prefer-default-export": 0,
    import: 0,
    "func-names": 0,
    "space-before-function-paren": 0,
    "comma-dangle": 0,
    // "max-len": 0,
    "import/extensions": 0,
    "no-underscore-dangle": 0,
    "consistent-return": 0,
    "react/display-name": 1,
    "react/no-array-index-key": 0,
    "react/react-in-jsx-scope": 0,
    "react/prefer-stateless-function": 0,
    // "react/forbid-prop-types": 0,
    "react/no-unescaped-entities": 0,
    "jsx-a11y/accessible-emoji": 0,
    // "react/jsx-filename-extension": [
    //   1,
    //   {
    //     extensions: [".js", ".jsx"],
    //   },
    // ],
    // radix: 0,
    "no-shadow": [
      2,
      {
        hoist: "all",
        allow: ["resolve", "reject", "done", "next", "err", "error"],
      },
    ],
    quotes: [
      2,
      "single",
      {
        avoidEscape: true,
        allowTemplateLiterals: true
      },
    ],
    "prettier/prettier": [
      "warn",
      {
        trailingComma: "none",
        singleQuote: true,
        printWidth: 80,
        bracketSpacing: true,
        jsxBracketSameLine: false,
        tabWidth: 2,
        semi: true
      },
    ],

    "linebreak-style": "off", // Don"t play nicely with Windows.

    "arrow-parens": "off", // Incompatible with prettier
    "object-curly-newline": "off", // Incompatible with prettier
    "no-mixed-operators": "off", // Incompatible with prettier
    // "arrow-body-style": "off", // Not our taste?
    "function-paren-newline": "off", // Incompatible with prettier
    "no-plusplus": "off",

    "max-len": ["warn", 80, 2, {
      ignoreUrls: true,
    }], // airbnb is allowing some edge cases
    "no-console": "warn", // airbnb is using warn
    "no-alert": "warn", // airbnb is using warn
    "no-param-reassign": "off", // Not our taste?
    "radix": "off", // parseInt, parseFloat radix turned off. Not my taste.

    "react/require-default-props": "off", // airbnb use error
    "react/forbid-prop-types": "off", // airbnb use error
    "react/jsx-filename-extension": ["error", {
      extensions: [".js"]
    }], // airbnb is using .jsx

    "prefer-destructuring": "off",

    "react/no-find-dom-node": "off", // I don"t know
    "react/no-did-mount-set-state": "off",
    "react/no-unused-prop-types": "off", // Is still buggy
    "react/jsx-one-expression-per-line": "off",

    "jsx-a11y/anchor-is-valid": ["warn", {
      "components": ["Link"],
      "specialLink": ["to"],
      "aspects": ["invalidHref"]
    }],

    "jsx-a11y/label-has-for": [2, {
      "required": {
        "every": ["id"]
      }
    }], // for nested label htmlFor error

    "jsx-a11y/href-no-hash": "off",
  },
  plugins: [
    // "html",
    "prettier",
    "flowtype",
    "react",
    "standard",
    "jsx-a11y",
    // "tslint",
    "typescript",
    "babel",
    "import"
  ],
};
