import axios from 'axios'
import {
  REGISTER_SUCCESS,
  REGISTER_FAIL,
  USER_LOADED,
  AUTH_ERROR,
  LOGIN_FAIL,
  LOGIN_SUCCESS,
  LOGOUT,
  CLEAR_PROFILE
} from './types'
import { setAlert } from './alert'
import setAuthToken from '../utils/setAuthToken'

// load user
export const loadUser = () => async dispatch => {
  if (localStorage.token) setAuthToken(localStorage.token)
  try {
    const res = await axios.get('/api/user')
    dispatch({
      type: USER_LOADED,
      payload: res.data
    })
  } catch (err) {
    console.log(err)
    dispatch({ type: AUTH_ERROR })
  }
}

// register user
export const registerUser = newUser => async dispatch => {
  const body = JSON.stringify(newUser)
  const config = {
    headers: {
      'Content-Type': 'application/json'
    }
  }
  try {
    const res = await axios.post('/api/user/register', body, config)
    dispatch({
      type: REGISTER_SUCCESS,
      payload: res.data
    })
    // just to load immediatly
    dispatch(loadUser())
  } catch (err) {
    const { errors } = err.response.data
    if (errors) {
      errors.forEach(error => dispatch(setAlert(error.msg, 'danger')))
    }
    dispatch({ type: REGISTER_FAIL })
  }
}

// login user
export const loginUser = newUser => async dispatch => {
  const body = JSON.stringify(newUser)
  const config = {
    headers: {
      'Content-Type': 'application/json'
    }
  }
  try {
    const res = await axios.post('/api/user/auth', body, config)
    dispatch({
      type: LOGIN_SUCCESS,
      payload: res.data
    })
    // just to load immediatly
    dispatch(loadUser())
  } catch (err) {
    const { errors } = err.response.data
    if (errors) {
      errors.forEach(error => dispatch(setAlert(error.msg, 'danger')))
    }
    dispatch({ type: LOGIN_FAIL })
  }
}
// logout / clear profile

export const logout = () => dispatch => {
  dispatch({
    type: CLEAR_PROFILE
  })
  dispatch({
    type: LOGOUT
  })
}
