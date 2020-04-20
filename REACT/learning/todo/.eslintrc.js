module.exports = {
  "extends": [
    "airbnb",
    "prettier",
    "prettier/react",
    "plugin:prettier/recommended",
    "plugin:react/recommended",
    "plugin:jsx-a11y/recommended"
    // "standard",
    // "eslint:recommended",
    // "plugin:flowtype/recommended",
    // "prettier/flowtype",
    // "prettier/standard",
    // "jest-enzyme",
    // "plugin:jest/recommended",
    // "typescript",
    // "typescript/react",
    // "typescript/prettier",
    // "tslint-react",
    // "tslint-eslint-rules",
    // "tslint-config-prettier",
    // "plugin:tslint/recommended",
    // "plugin:tslint/latest"
  ],
  "parser": "babel-eslint",
  "parserOptions": {
    "ecmaVersion": 2019,
     "sourceType": "module",
    // Can I remove these now?
    "ecmaFeatures": {
      "allowImportExportEverywhere": true,
      "experimentalObjectRestSpread": true,
      "jsx": true,
      "impliedStrict": true,
      "classes": true
    }
  },
  "env": {
    "browser": true,
    "node": true,
    "commonjs": true,
    "jquery": true,
    "jest": true,
    "es6":true
  },
  "rules": {
    "no-debugger": 0,
    "no-alert": 0,
    "no-await-in-loop": 0,
    "no-return-assign": [
      "error",
      "except-parens"
    ],
    "no-restricted-syntax": [
      2,
      //"ForInStatement",
      "LabeledStatement",
      "WithStatement"
    ],
    "no-unused-vars": [
      1,
      {
        "ignoreSiblings": true,
        "argsIgnorePattern": "res|next|^err"
      }
    ],
    "prefer-const": [
      "error",
      {
        "destructuring": "all",
      }
    ],
    "arrow-body-style": [
      2,
      "as-needed"
    ],
    "no-unused-expressions": [
      2,
      {
        "allowTaggedTemplates": true
      }
    ],
    "no-param-reassign": [
      2,
      {
        "props": false
      }
    ],
    "no-console": 0,
    "no-continue":0,
    "no-restricted-globals":0,
    "no-multi-assign":0,
    "no-undef":0,
    "import/prefer-default-export": 0,
    "import": 0,
    "func-names": 0,
    "space-before-function-paren": 0,
    "comma-dangle": 0,
    "max-len": 0,
    "import/extensions": 0,
    "no-underscore-dangle": 0,
    "consistent-return": 0,
    "react/display-name": 1,
    "react/no-array-index-key": 0,
    "react/react-in-jsx-scope": 0,
    "react/prefer-stateless-function": 0,
    "react/forbid-prop-types": 0,
    "react/no-unescaped-entities": 0,
    "jsx-a11y/accessible-emoji": 0,
    "react/require-default-props": 0,
    "react/jsx-filename-extension": [
      1,
      {
        "extensions": [
          ".js",
          ".jsx"
        ]
      }
    ],
    "radix": 0,
    "no-shadow": 0,

    // "no-shadow": [
    //   2,
    // 0 allow , 1 dont allow , 2 allow with conditions
    //   {
    //     "hoist": "all",
    //     "allow": [
    //       "resolve",
    //       "reject",
    //       "done",
    //       "next",
    //       "err",
    //       "error"
    //     ]
    //   }
    // ],
    "quotes": [
      2,
      "single",
      {
        "avoidEscape": true,
        "allowTemplateLiterals": true
      }
    ],
    "prettier/prettier": [
      "error",
      {
        "trailingComma": "none",
        "singleQuote": true,
        "printWidth": 80,
        "jsxSingleQuote": true,
        "bracketSpacing": true,
        "jsxBracketSameLine": false,
        "tabWidth": 2,
        "semi": false
      }
    ],
    "no-plusplus":"off",
    "jsx-a11y/href-no-hash": "off",
    "jsx-a11y/anchor-is-valid": [
      "warn",
      {
        "aspects": [
          "invalidHref"
        ]
      }
    ],
    "react-hooks/rules-of-hooks": "error",
    "react-hooks/exhaustive-deps": "warn"
  },
  "plugins": [
    "html",
    "prettier",
    "react-hooks"
  ]
}
