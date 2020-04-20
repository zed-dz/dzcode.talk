module.exports = {
  "extends": [
    "airbnb",
    "google",
    "kentcdodds",
    "kentcdodds/es6/possible-errors",
    "kentcdodds/es6/best-practices",
    "kentcdodds/es6/stylistic",
    "kentcdodds/react",
    "plugin:react/recommended",
    "plugin:jsx-a11y/recommended",
    "plugin:import/errors",
    "plugin:import/warnings",
    "plugin:promise/recommended"
    // "plugin:prettier/recommended",
    // "prettier",
    // "prettier/react",
    // "xo/esnext",
    // "plugin:node/recommended",
    // "plugin:unicorn/recommended"
  ],
    "plugins": [
    "html",
    "react-hooks",
    "react",
    "import",
    "json",
    "eslint-comments",
    "optimize-regex",
    "promise",
    "jsx-a11y",
    "babel",
    "flowtype"
    // "prettier",
    // "unicorn",
  ],
  "parser": "babel-eslint",
  "parserOptions": {
    "ecmaVersion": 2019,
    "sourceType": "module",
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
    "es6": true
  },
  "rules": {
    "no-debugger": 0,
    "no-alert": 0,
    "no-await-in-loop": 0,
    "no-return-assign": [
      2,
      "except-parens"
    ],
    "no-restricted-syntax": [
      2,
      "LabeledStatement",
      "WithStatement"
    ],
    "prefer-const": [
      2,
      {
        "destructuring": "all"
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
    "no-continue": 0,
    "class-methods-use-this": 0,
    "no-process-exit": 0,
    "no-restricted-globals": 0,
    "no-multi-assign": 0,
    "no-undef": 0,
    "import/prefer-default-export": 0,
    "import": 0,
    "func-names": 0,
    "space-before-function-paren": 0,
    "comma-dangle": 0,
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
    "node/no-unsupported-features/es-syntax": 0,
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
    "quotes": [
      2,
      "single",
      {
        "avoidEscape": true,
        "allowTemplateLiterals": true
      }
    ],
    // "prettier/prettier": [
    //   2,
    //   {
    //     "trailingComma": "none",
    //     "singleQuote": true,
    //     "printWidth": 80,
    //     "jsxSingleQuote": true,
    //     "bracketSpacing": true,
    //     "jsxBracketSameLine": false,
    //     "tabWidth": 2,
    //     "semi": false,
    //     "useTabs": false
    //   }
    // ],
    "no-plusplus": 0,
    "jsx-a11y/href-no-hash": 0,
    "jsx-a11y/anchor-is-valid": [
      1,
      {
        "aspects": [
          "invalidHref"
        ]
      }
    ],
    "react-hooks/rules-of-hooks": 2,
    "react-hooks/exhaustive-deps": 1,
    "indent": [
      2,
      2,
      {
        "SwitchCase": 1,
        "VariableDeclarator": 2
      }
    ],
    "max-len": [
      2,
      200,
      {
        "ignoreComments": true,
        "ignoreUrls": true,
        "tabWidth": 2
      }
    ],
    "no-unused-vars": [
      2,
      {
        "vars": "all",
        "args": "after-used",
        "argsIgnorePattern": "(^reject$|^_$|res|next|^err)",
        "varsIgnorePattern": "(^_$)",
        "ignoreSiblings": true
      }
    ],
    "eslint-comments/disable-enable-pair": 2,
    "eslint-comments/no-duplicate-disable": 2,
    "eslint-comments/no-unlimited-disable": 2,
    "eslint-comments/no-unused-disable": 2,
    "eslint-comments/no-unused-enable": 2,
    "optimize-regex/optimize-regex": 1,
    "valid-jsdoc": 0,
    "strict": 0,
    "curly": 0,
    "arrow-parens": [
      2,
      "as-needed"
    ],
    "unicorn/prefer-type-error": 0,
    "require-jsdoc": 0,
    "no-implicit-coercion": 0,
    "semi": [
      2,
      "never"
    ],
    "semi-style": 0,
    "unicorn/prevent-abbreviations": 0,
    "unicorn/filename-case": 0,
    "no-useless-catch": 1,
    "jsx-quotes": 0,
    "no-negated-condition": 1,
    "babel/no-unused-expressions": 0,
    "import/no-unresolved": 0,
    "object-curly-spacing": 0,
  }
}
