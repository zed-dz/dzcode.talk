import React, { useState, Fragment } from 'react'
import { connect } from 'react-redux'
import { Link, Redirect } from 'react-router-dom'
import PropTypes from 'prop-types'
// import axios from 'axios'
import { setAlert } from '../../actions/alert'
import { registerUser } from '../../actions/auth'

// import DisplayErrors from '../../DisplayErrors'
// import classnames from 'classnames'

const Register = ({ setAlert, registerUser, isAuthenticated }) => {
  const [user, setUser] = useState({
    name: '',
    email: '',
    password: '',
    password2: ''
  })
  const { name, email, password, password2 } = user

  const onSubmit = async e => {
    e.preventDefault()
    // try {
    if (password !== password2) {
      setAlert('password didnt match', 'danger', 3000)
      // document.querySelector('.last').innerHTML = 'password does not match'
      // document.getElementById('lastinput').classList.add('is-invalid')
    } else {
      const newUser = { name, email, password }
      registerUser(newUser)
      // document.querySelector('.last').innerHTML = ''
      // const config = {
      //   headers: {
      //     'Content-Type': 'application/json'
      //   }
      // }
      // const body = JSON.stringify(newUser)
      // const res = await axios.post('/api/user/register', body, config)
      // console.log(res.data)
      // await props.registerUser(newUser)
    }
    // } catch (err) {
    // console.error(err.response.data)
    // if (errors) DisplayErrors(errors)
    // }
  }
  const onChange = e => {
    setUser({ ...user, [e.target.name]: e.target.value })
  }
  if (isAuthenticated) {
    return <Redirect to='/dashboard' />
  }
  return (
    <Fragment>
      <section className='container'>
        <h1 className='large text-primary'>Sign Up</h1>
        <p className='lead'>
          <i className='fas fa-user' /> Create Your Account
        </p>
        <form
          // className='form needs-validation'
          className='form'
          action='create-profile.html'
          onSubmit={e => onSubmit(e)}
          // noValidate
        >
          <div className='form-group'>
            <input
              type='text'
              // id='firstinput'
              placeholder='Name'
              name='name'
              value={name}
              onChange={e => onChange(e)}
              // required
            />
            {/* bootstrap class */}
            {/* <div className='invalid-feedback' />
          <div className='valid-feedback'>name verified</div> */}
          </div>
          <div className='form-group'>
            <input
              type='email'
              placeholder='Email Address'
              name='email'
              value={email}
              onChange={e => onChange(e)}
              // required
              // id='secondinput'
            />
            {/* <div className='invalid-feedback'> </div>
          <div className='valid-feedback'>email-verified</div> */}
            <small className='form-text'>
              This site uses Gravatar so if you want a profile image, use a
              Gravatar email
            </small>
          </div>
          <div className='form-group'>
            <input
              type='password'
              // id='thirdinput'
              placeholder='Password'
              name='password'
              value={password}
              onChange={e => onChange(e)}
              // minLength='6'
            />
            {/* <div className='invalid-feedback'> </div>
          <div className='valid-feedback'>password verified</div> */}
          </div>
          <div className='form-group'>
            <input
              type='password'
              // id='lastinput'
              placeholder='Confirm Password'
              name='password2'
              value={password2}
              onChange={e => onChange(e)}
              // minLength='6'
            />
            {/* <div className='invalid-feedback last'> </div>
          <div className='valid-feedback'> password matched </div> */}
          </div>
          <input type='submit' className='btn btn-primary' value='Register' />
        </form>
        <p className='my-1'>
          Already have an account? <Link to='/login'>Sign In</Link>
        </p>
      </section>
    </Fragment>
  )
}

Register.propTypes = {
  setAlert: PropTypes.func.isRequired,
  registerUser: PropTypes.func.isRequired,
  isAuthenticated: PropTypes.bool
}

const mapStateToProps = state => ({
  isAuthenticated: state.auth.isAuthenticated
})
export default connect(
  mapStateToProps,
  { setAlert, registerUser }
)(Register)

/* <div className='register'>
        <div className='container'>
          <br />
          <div className='errorShow' />
          <div className='row'>
            <div className='col-md-8 m-auto'>
              <h1 className='display-4 text-center'>Sign Up</h1>
              <p className='lead text-center'>
                Create your DevConnector account
              </p>
              <form
                onSubmit={e => onSubmit(e)}
                className='needs-validation'
                noValidate
              >
                <div className='form-group'>
                  <input
                    type='text'
                    id='firstinput'
                    className='form-control form-control-lg'
                    // className={classnames(`form-control form-control-lg ,
                    // ${isValid ? 'is-valid' : 'is-invalid'}`)}
                    placeholder='Name'
                    name='name'
                    value={name}
                    onChange={e => onChange(e)}
                  />
                  <div className='invalid-feedback' />
                  <div className='valid-feedback'>name verified</div>
                </div>
                <div className='form-group'>
                  <input
                    type='email'
                    id='secondinput'
                    className='form-control form-control-lg'
                    // className={classnames(`form-control form-control-lg ,
                    // ${isValid ? 'is-valid' : 'is-invalid'}`)}
                    placeholder='Email Address'
                    name='email'
                    value={email}
                    onChange={e => onChange(e)}
                  />
                  <div className='invalid-feedback'> </div>
                  <div className='valid-feedback'>email-verified</div>
                </div>
                <div className='form-group'>
                  <input
                    type='password'
                    id='thirdinput'
                    className='form-control form-control-lg'
                    // className={classnames(`form-control form-control-lg ,
                    // ${isValid ? 'is-valid' : 'is-invalid'}`)}
                    placeholder='Password'
                    name='password'
                    value={password}
                    onChange={e => onChange(e)}
                  />
                  <div className='invalid-feedback'> </div>
                  <div className='valid-feedback'>password verified</div>
                </div>
                <div className='form-group'>
                  <input
                    type='password'
                    id='lastinput'
                    className='form-control form-control-lg'
                    placeholder='Confirm Password'
                    name='password2'
                    value={password2}
                    onChange={e => onChange(e)}
                  />
                  <div className='invalid-feedback last'> </div>
                  <div className='valid-feedback'> password matched </div>
                </div>
                <input type='submit' className='btn btn-info btn-block mt-4' />
              </form>
            </div>
          </div>
        </div>
      </div> */
