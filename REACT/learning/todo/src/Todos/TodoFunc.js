import React from 'react'
import propTypes from 'prop-types'

const Todocomponent = ({ oneTodo, index, completeTodo, removeTodo }) => (
  <>
    <div
      className='todo'
      style={{ textDecoration: oneTodo.isCompleted ? 'line-through' : '' }}
    >
      {oneTodo.text}
      <div>
        <button type='button' onClick={() => completeTodo(index)}>
          Complete
        </button>
        <button type='button' onClick={() => removeTodo(index)}>
          x
        </button>
      </div>
    </div>
  </>
)

Todocomponent.propTypes = {
  oneTodo: propTypes.object.isRequired,
  index: propTypes.number.isRequired,
  completeTodo: propTypes.func.isRequired,
  removeTodo: propTypes.func.isRequired
}

export default Todocomponent
