import React, { Component, Fragment, useState } from 'react'
import axios from 'axios'
import classnames from 'classnames'

export default class Register extends Component {
  // componenet state
  constructor() {
    super()
    this.state = {
      name: '',
      email: '',
      password: '',
      password2: '',
      errors: {},
      isValid: true
    }
    this.onChange = this.onChange.bind(this)
    this.onSubmit = this.onSubmit.bind(this)
    // this.displayErr = this.displayErr.bind(this)
  }

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value })
  }

  async onSubmit(e) {
    e.preventDefault()
    const newUser = {
      name: this.state.name,
      email: this.state.email,
      password: this.state.password,
      password2: this.state.password2
    }
    try {
      this.setState({ isValid: !this.state.isValid })
      const res = await axios.post('/api/users/register', newUser)
      console.log(res.data)
    } catch (err) {
      // this.setState({
      //   errors: [...this.state.errors, err.response.data]
      // })
      this.setState({ errors: err.response.data })
    }
  }

  render() {
    const { errors, isValid } = this.state

    const isEmpty = value =>
      value === undefined ||
      value === null ||
      (typeof value === 'object' && Object.keys(value).length === 0) ||
      (typeof value === 'string' && value.trim().length === 0)

    function displayErr(y) {
      let msg = ''
      Object.values(errors).forEach(err => {
        if (!isEmpty(err[y])) {
          msg = err[y].msg
        }
      })
      return msg
    }

    return (
      <div className='register'>
        <div className='container'>
          <div className='row'>
            <div className='col-md-8 m-auto'>
              <h1 className='display-4 text-center'>Sign Up</h1>
              <p className='lead text-center'>
                Create your DevConnector account
              </p>
              <form
                onSubmit={this.onSubmit}
                className='needs-validation'
                noValidate
              >
                <div className='form-group'>
                  <input
                    type='text'
                    // className='form-control form-control-lg'
                    className={classnames(
                      `form-control form-control-lg ${
                        !isValid
                          ? ('is-invalid': 'ok')
                          : ('is-valid': 'displayErr(0)')
                      }`
                    )}
                    placeholder='Name'
                    name='name'
                    value={this.state.name}
                    onChange={this.onChange}
                  />

                  {/* {errors[0].msg && (
                    <div className='invalid-feedback' name='feedback'>
                      {errors[0].msg}
                    </div>
                  )} */}

                  <div className='invalid-feedback'>{displayErr(0)}</div>
                  <div className='valid-feedback'>ok</div>
                </div>
                <div className='form-group'>
                  <input
                    type='email'
                    // className='form-control form-control-lg'
                    // className={classnames('form-control form-control-lg', {
                    // 'is-invalid': `${isValid ? displayErr(1) : ''}`
                    // `${isValid ? 'is-invalid' : 'is-valid'}`
                    // })}
                    className={classnames(
                      `form-control form-control-lg ${
                        !isValid
                          ? ('is-invalid': 'ok')
                          : ('is-valid': 'displayErr(1)')
                      }`
                    )}
                    placeholder='Email Address'
                    name='email'
                    value={this.state.email}
                    onChange={this.onChange}
                  />
                  {/* {errors[1].msg && (
                    <div className='invalid-feedback' name='feedback'>
                      {errors[1].msg}
                    </div>
                  )} */}
                  <div className='invalid-feedback'> {displayErr(1)} </div>
                  <div className='valid-feedback'>ok</div>
                  <small className='form-text text-muted'>
                    This site uses Gravatar so if you want a profile image, use
                    a Gravatar email
                  </small>
                </div>
                <div className='form-group'>
                  <input
                    type='password'
                    className={classnames(
                      `form-control form-control-lg ${
                        !isValid
                          ? ('is-invalid': 'ok')
                          : ('is-valid': 'displayErr(2)')
                      }`
                    )}
                    placeholder='Password'
                    name='password'
                    value={this.state.password}
                    onChange={this.onChange}
                  />
                  <div className='invalid-feedback'> {displayErr(2)} </div>
                  <div className='valid-feedback'>ok</div>
                </div>
                <div className='form-group'>
                  <input
                    type='password'
                    className={classnames(
                      `form-control form-control-lg ${
                        !isValid
                          ? ('is-invalid': 'ok')
                          : ('is-valid': 'displayErr(3)')
                      }`
                    )}
                    placeholder='Confirm Password'
                    name='password2'
                    value={this.state.password2}
                    onChange={this.onChange}
                  />
                  <div className='invalid-feedback'> {displayErr(3)} </div>
                  <div className='valid-feedback'> ok </div>
                </div>
                <input type='submit' className='btn btn-info btn-block mt-4' />
              </form>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
/*
console.log(Object.values(err.response.data)[0])
let a = this.state.errors.slice()
// creates the clone of the state
a.map((data, index) => a[index] = err.response.data)
console.log(a)
a[index] = err.response.data
this.setState({ errors: a })
this.setState({errors: err.response.data})
this.setState(prevState => ({
  errors: [...prevState.errors, newelement]
}))

console.log((errors[0])
const isEmpty = value =>
  value === undefined ||
  value === null ||
  (typeof value === 'object' && Object.keys(value).length === 0) ||
  (typeof value === 'string' && value.trim().length === 0)

function errorArrayMsg(string) {
  for (const key of Object.values(errors)) {
    if (isEmpty(key[0])) return ''
    switch (string) {
      case 'name':
        if ((key[0].param = 'name')) return key[0].msg
        key[0].msg = ''
        return ''
      case 'email':
        if ((key[0].param = 'email')) return key[0].msg
        return ''
      case 'password':
        if ((key[0].param = 'password')) return key[0].msg
        return ''
      case 'password2':
        if ((key[0].param = 'password')) return key[0].msg
        return ''
      default:
        return ''
    }
    if (isEmpty(key[position])) return ''
    switch (position) {
      case 0:
        if ((key[0].param = 'name')) return key[0].msg
        return ''
      case 1:
        if ((key[1].param = 'email')) return key[1].msg
        return ''
      case 2:
        if ((key[2].param = 'password')) return key[2].msg
        return ''
      case 3:
        if ((key[3].param = 'password')) return key[3].msg
        return ''
      default:
        return ''
    }
  }
}
*/
