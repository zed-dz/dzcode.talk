const search = document.getElementById('search')
const searchList = document.getElementById('match-list')
// output the results to the html using map and join
// map will take the html body given and return as an array of html elements
// then join them to a string and ofc an innerhtml at the end
const outputHtml = matches => {
  if (matches) {
    const html = matches
      .map(
        match => `
  <div class="card card-body mb-1">
  <h4>
  ${match.name}(${match.abbr}) <span class="text-primary">${
          match.capital
        }</span>
  </h4>
  <small> lat : ${match.lat} / long : ${match.long}</small>
  </div>
  `
      )
      .join('')
    searchList.innerHTML = html
  }
}

const searchItems = async searchText => {
  const res = await fetch('data.json')
  const data = await res.json()
  let matches = data.filter(state => {
    // g = global , i = case sensitive
    const regex = new RegExp(`^${searchText}`, 'gi')
    return state.name.match(regex) || state.abbr.match(regex)
  })
  // reset the input search
  if (searchText.length === 0) {
    matches = []
    searchList.innerHTML = ''
  }

  outputHtml(matches)
}
// search.value to get the value typed in the input
search.addEventListener('input', () => searchItems(search.value))
