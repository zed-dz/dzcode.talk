class Person {
  constructor(name, age) {
    this.name = name
    this.age = age
  }

  getName() {
    return `My name is ${this.name}, I'm ${this.age} years old.`
  }
}
// it helps reuse the person class anywhere in other files
module.exports = Person
