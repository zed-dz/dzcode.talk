import React from 'react'
import propTypes from 'prop-types'
const User = ({ children, age }) => {
  const ageValid = age || 'NA'
  if (children)
    return (
      <div>
        <p>
          Name: {children} | age: {ageValid}
        </p>
      </div>
    )
  return <div>Invalid Entry </div>
}
User.propTypes = {
  children: propTypes.string,
  age: propTypes.string
}
export default User
