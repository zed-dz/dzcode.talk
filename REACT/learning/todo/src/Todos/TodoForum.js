import React, { useState } from 'react'
import propTypes from 'prop-types'

const Forumtodocomponent = ({ addTodo }) => {
  const [forumtodo, setForumtodo] = useState('')
  const handleSubmit = e => {
    e.preventDefault()
    if (!forumtodo) return
    addTodo(forumtodo)
    setForumtodo('')
  }
  return (
    <form onSubmit={handleSubmit}>
      <input
        type='text'
        className='input'
        value={forumtodo}
        onChange={e => setForumtodo(e.target.value)}
      />
      <input type='submit' className='input' value='add' />
    </form>
  )
}
Forumtodocomponent.propTypes = {
  addTodo: propTypes.func.isRequired
}

export default Forumtodocomponent
