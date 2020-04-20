import React, { useState, Fragment } from 'react'
import { Link, Redirect } from 'react-router-dom'
import { connect } from 'react-redux'
import { PropTypes } from 'prop-types'
import { loginUser } from '../../actions/auth'

const Login = ({ loginUser, isAuthenticated }) => {
  const [user, setUser] = useState({
    email: '',
    password: ''
  })

  const { email, password } = user

  const onChange = e => {
    setUser({ ...user, [e.target.name]: e.target.value })
  }

  // const onSubmit = async e => {
  // e.preventDefault()
  // const newUser = (email, password)
  // try {
  //   const res = await axios.post('/api/user/auth', newUser, config)
  //   console.log(res.data)
  // } catch (err) {
  //   console.error(err.response.data)
  // const { errors } = err.response.data
  // if (errors) {
  //   errors.forEach(error => console.log(error.msg))
  // }
  // }
  // }

  // redirect if loged in
  if (isAuthenticated) {
    // return <Redirect to='/posts' />
    return <Redirect to='/dashboard' />
  }
  return (
    <Fragment>
      <section className='container'>
        <div className='alert alert-danger'>Invalid credentials</div>
        <h1 className='large text-primary'>Sign In</h1>
        <p className='lead'>
          <i className='fas fa-user' /> Sign into Your Account
        </p>
        <form
          className='form'
          action='dashboard.html'
          onSubmit={async e => {
            e.preventDefault()
            const newUser = { email, password }
            await loginUser(newUser)
          }}
        >
          <div className='form-group'>
            <input
              type='email'
              placeholder='Email Address'
              name='email'
              value={email}
              onChange={e => onChange(e)}
              required
            />
          </div>
          <div className='form-group'>
            <input
              type='password'
              placeholder='Password'
              name='password'
              value={password}
              onChange={e => onChange(e)}
            />
          </div>
          <input type='submit' className='btn btn-primary' value='Login' />
        </form>
        <p className='my-1'>
          Don't have an account? <Link to='/register'>Sign Up</Link>
        </p>
      </section>
    </Fragment>
  )
}

Login.propTypes = {
  loginUser: PropTypes.func.isRequired,
  isAuthenticated: PropTypes.bool
}
// get the auth state
const mapStateToProps = state => ({
  isAuthenticated: state.auth.isAuthenticated
})

export default connect(
  mapStateToProps,
  { loginUser }
)(Login)

/* <div className='container'>
  <div className='login'>
    <div className='row'>
      <div className='col-md-8 m-auto'>
        <h1 className='display-4 text-center'>Log In</h1>
        <p className='lead text-center'>
          Sign in to your DevConnector account
        </p>
        <form onSubmit={e => onSubmit(e)}>
          <div className='form-group'>
            <input
              type='email'
              className='form-control form-control-lg'
              placeholder='Email Address'
              name='email'
              value={email}
              onChange={e => onChange(e)}
            />
          </div>
          <div className='form-group'>
            <input
              type='password'
              className='form-control form-control-lg'
              placeholder='Password'
              name='password'
              value={password}
              onChange={e => onChange(e)}
            />
          </div>
          <input type='submit' className='btn btn-info btn-block mt-4' />
        </form>
      </div>
    </div>
  </div>
</div> */
