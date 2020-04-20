import React, { useState } from 'react'

const Search = () => {
  const [location, setLocation] = useState('Seatle, NYC')
  return (
    <div className='search-params'>
      <h1>{location}</h1>
      <form action=''>
        <label htmlFor='location'>
          {' '}
          location
          <input
            id='location'
            value={location}
            placeholder='location'
            onChange={e => setLocation(e.target.value)}
          />
        </label>
        <button>submit</button>
      </form>
    </div>
  )
}

export default Search
