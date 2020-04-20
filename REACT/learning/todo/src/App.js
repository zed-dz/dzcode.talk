import React, { useState } from 'react'
import './App.css'
import Todocomponent from './Todos/TodoFunc'
import Forumtodocomponent from './Todos/TodoForum'

const App = () => {
  const [todoState, setTodos] = useState([
    { text: 'learn about hooks', isCompleted: false },
    { text: 'dont learn go have a cap of cofee', isCompleted: false },
    { text: 'i dont know do soemthing', isCompleted: false }
  ])
  const addTodo = text => {
    setTodos([...todoState, { text }])
  }
  const completeTodo = index => {
    const newtodos = [...todoState]
    newtodos[index].isCompleted = true
    setTodos(newtodos)
  }
  const removeTodo = index => {
    const newtodo = [...todoState]
    newtodo.splice(index, 1)
    setTodos(newtodo)
  }
  return (
    <>
      <div className='todo-list'>
        {todoState.map((todo, index) => (
          <Todocomponent
            key={index}
            index={index}
            oneTodo={todo}
            completeTodo={completeTodo}
            removeTodo={removeTodo}
          />
        ))}
        <Forumtodocomponent addTodo={addTodo} />
      </div>
    </>
  )
}

export default App
