import Axios from 'axios'
import { setAlert } from './alert'
import { GET_PROFILE, PROFILE_ERROR } from './types'

// get current users profile
export const getCurrentProfile = () => async dispatch => {
  try {
    // we dont have to pass an id bcz its gonna know which profile to load from the token we sent which have the userid
    const res = await Axios.get('/api/profile/me')
    dispatch({
      type: GET_PROFILE,
      payload: res.data
    })
  } catch (e) {
    // const { errors } = err.response.data
    // if (errors) {
    //   errors.forEach(error => dispatch(setAlert(error.msg, 'danger')))
    // }
    dispatch({
      type: PROFILE_ERROR,
      payload: { msg: e.response.statusText, status: e.response.status }
    })
  }
}
