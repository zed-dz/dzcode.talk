const ul = document.getElementById('item-list');
const addItem = document.getElementById('add-item');
const search = document.getElementById('filter');
const form = document.getElementById('formx');
// the eventlistner will listen at types of the keyboard in the searchbar
search.addEventListener('keyup', searchItems);
// we listen to a specific submit so a form is okay
form.addEventListener('submit', addingItems);
// we listen to a click of a button not a submit of an input
ul.addEventListener('click', deleteItems);

function addingItems(e) {
  // its a submit so we prevent it default behavior of submiting
  e.preventDefault();
  // we get the input value
  const item = addItem.value;
  /* creating the new li */
  const newLi = document.createElement('li');
  newLi.className = 'list-group-item';
  newLi.appendChild(document.createTextNode(item));
  /* creating the button of the li */
  const btn = document.createElement('button');
  btn.appendChild(document.createTextNode('X'));
  btn.className = 'delete';
  /* then appending the button to the li and the li the ul */
  newLi.appendChild(btn);
  ul.appendChild(newLi);
  // finally we empty up the input value after clicking
  addItem.value = '';
}
function deleteItems(e) {
  // e.target refers to the element of the eventlistner here it is the button
  // we check if the buttons contain the class delete so that it is more precise
  if (e.target.classList.contains('delete')) {
    if (confirm('are you sure')) {
      // obviously theparentelement of the button is the li
      const li = e.target.parentElement;
      ul.removeChild(li);
    }
  }
}

function searchItems(e) {
  // we lowercase everything so that whatever we type in will match
  const inputSearch = e.target.value.toLowerCase();
  // here the li's are a list of objects so we need to convert them to an array to match the strings
  const li = ul.getElementsByTagName('li');
  /* array.from(li) is the function that converts the obj to an array then we loop through them with foreach
  and we put inside of it a function of items that do the matching */
  Array.from(li).forEach(items => {
    // we return the text inside of evry first li
    const itemName = items.firstChild.textContent;
    if (itemName.toLowerCase().indexOf(inputSearch) !== -1) {
      // if it matches we change the display of the item or else we hide it
      items.style.display = 'block';
    } else {
      items.style.display = 'none';
    }
  });
}
