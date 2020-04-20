# VSCode - ESLint, Prettier & Airbnb Setup

### 1. Install ESLint & Prettier extensions for VSCode

Optional - Set format on save and any global prettier options

### 2. Install Packages
```
npm i -D eslint prettier eslint-plugin-prettier eslint-config-prettier eslint-plugin-node eslint-config-node
```

```
npx install-peerdeps --dev eslint-config-airbnb
```

### 3. Create .prettierrc for any prettier rules (semicolons, quotes, etc)

### 4. Create .eslintrc.json file (You can generate with eslint --init if you install eslint globally)

```
{
  "extends": ["airbnb", "prettier", "plugin:node/recommended"],
  "plugins": ["prettier"],
  "rules": {
    "prettier/prettier": "error",
    "no-unused-vars": "warn",
    "no-console": "off",
    "func-names": "off",
    "no-process-exit": "off",
    "object-shorthand": "off",
    "class-methods-use-this": "off"
  }
}
```

### Reference
* ESLint Rules - https://eslint.org/docs/rules/
* Prettier Options - https://prettier.io/docs/en/options.html
* Airbnb Style Guide - https://github.com/airbnb/javascript