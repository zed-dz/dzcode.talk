import React, { useState } from 'react'
import propTypes from 'prop-types'
import User from './User'

const Users = ({ title }) => {
  // hooks must be wrapped inside a function
  const [user, setUser] = useState({
    name: 'amine',
    job: 'code talk'
  })
  const { name, job } = user

  const handleClick = () => {
    // console.log(e.target, e.pageX, name)
    // spread operator to copy the user && edit the name value
    setUser({ ...user, name: 'Hammou' })
  }

  /*  when we use 'this' in a normal function declaration (function handle() {}) we then cannot access
      what's outside of that function for example the state cz here this will reference to the
      instance of that function not what is outside of it
      so the solution is to use arrow functions ( () => {}) cz the 'this' in arrow functions
      reference to whats outside of it with one level so here in this component 'this' will
      refer to the component instance (the User function!)
  */

  const handleCopy = () => console.log('you smart ass dont copy my shit :c')
  const onChange = e => {
    setUser({ ...user, [e.target.name]: [e.target.value] })
  }
  const onSubmit = e => {
    // the default action of the page is to refresh the page so we prevent that
    e.preventDefault()
    console.log('name changed', name)
  }
  return (
    <>
      <p>
        my name is : {name} | I work on : {job}
      </p>
      <h1>{title}</h1>
      <User age='30'>john</User>
      <User age='22'>Smith</User>
      <User>Doe</User>
      <User />

      {/* we dont use handleClick with parenthesises() will run as soon as the page loads and
      we dont want that we only want it to lunch on the event

       you can either pass it like this {handleClick} without the () or
       an arrow function with parameters {e => handleClick(e)} this also wont start when the page loads */}

      <button onClick={e => handleClick(e)}>Click me</button>
      <p onCopy={e => handleCopy(e)}>
        copy this text and check your console{' '}
        <span role='img' aria-label='smile'>
          👌 😼
        </span>
      </p>
      <form onSubmit={e => onSubmit(e)}>
        <input
          type='text'
          name='name'
          value={name}
          onChange={e => onChange(e)}
        />
        <input type='submit' value='change the name' />
      </form>

      {/* in setState onchange instead of doing name: e.target.value, job.target.value
      we can use kind of a shortcut to anykind of state which is [e.target.name]: [e.target.value]
      DONT FORGET TO ADD value={} name='' in the input field for this to work

      when we use the onsubmit in top of the forum instead of at the bottom then we can catch it
      if the user hits enter or click the button not just one functionality (the click) */}
    </>
  )
}

Users.propTypes = {
  title: propTypes.string.isRequired
}

export default Users
