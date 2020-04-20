import React, { Fragment } from 'react'
import { Link } from 'react-router-dom'
import { connect } from 'react-redux'
import { PropTypes } from 'prop-types'
import { logout } from '../../actions/auth'
// import { getCurrentProfile } from '../../actions/profile'

// getCurrentProfile,
// profile: { profile }
// user
const Navbar = ({ auth: { isAuthenticated, loading }, logout }) => {
  // useEffect(() => {
  //   getCurrentProfile()
  // }, [getCurrentProfile])

  // const userId = 'me'
  // if(isAuthenticated) userId = user._id

  const authLinks = (
    <ul>
      <li>{/* <Link to='/profiles'> Developers</Link> */}</li>

      <li>{/* <Link to={`/profile/${userId}`}>View Profile</Link> */}</li>
      <li>{/* <Link to='/posts'>Posts</Link> */}</li>
      <li>
        <Link to='/dashboard'>
          <i className='fas fa-user' />
          <span className='hide-sm'>Dashboard</span>
        </Link>
      </li>

      <li>
        <a onClick={logout} href='!#'>
          <i className='fas fa-sign-out-alt' /> {''}
          <span className='hide-sm'>Logout</span>
        </a>
      </li>
    </ul>
  )
  const guessLinks = (
    <ul>
      <li>
        <a href='!#'>Developers</a>
      </li>
      <li>
        <Link to='/register'>Register</Link>
      </li>
      <li>
        <Link to='/login'>Login</Link>
      </li>
    </ul>
  )
  return (
    /* jshint ignore:start */
    <nav className='navbar bg-dark'>
      <h1>
        <Link to='/'>
          <i className='fas fa-code' /> DevConnector
        </Link>
      </h1>
      {!loading && (
        <Fragment> {isAuthenticated ? authLinks : guessLinks} </Fragment>
      )}
    </nav>
  )
}

Navbar.propTypes = {
  logout: PropTypes.func.isRequired,
  // getCurrentProfile: PropTypes.func.isRequired,
  auth: PropTypes.object.isRequired
  // profile: PropTypes.object.isRequired
}

const mapStateToProps = state => ({
  auth: state.auth,
  profile: state.profile
})

/* jshint ignore:end */
export default connect(
  mapStateToProps,
  {
    logout
    // getCurrentProfile
  }
)(Navbar)
//   <nav className='navbar navbar-expand-sm navbar-dark bg-dark mb-4'>
//     <div className='container'>
//       <Link className='navbar-brand' to='/'>
//         DevConnector
//       </Link>
//       <button
//         className='navbar-toggler'
//         type='button'
//         data-toggle='collapse'
//         data-target='#mobile-nav'
//       >
//         <span className='navbar-toggler-icon' />
//       </button>

//       <div className='collapse navbar-collapse' id='mobile-nav'>
//         <ul className='navbar-nav mr-auto'>
//           <li className='nav-item'>
//             <Link className='nav-link' to='/profiles'>
//               Developers
//             </Link>
//           </li>
//         </ul>

//         <ul className='navbar-nav ml-auto'>
//           <li className='nav-item'>
//             <Link className='nav-link' to='/register'>
//               Sign Up
//             </Link>
//           </li>
//           <li className='nav-item'>
//             <Link className='nav-link' to='/login'>
//               Login
//             </Link>
//           </li>
//         </ul>
//       </div>
//     </div>
//   </nav>
