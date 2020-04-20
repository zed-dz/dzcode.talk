/*
Some functions and some things down here are just for education only i know there are some deprecated
functions and methods.

Security tip (from eslint & jshint) :
* I want to say that you should use console.log to check your variables and loops etc...
* don't use document.write(can be a form of eval) and alerts prompts ...
*  console logs also are just for  checking verifiying and debugging code dont keep'em there.

the difference between using var let const :
var is global variable that is used in the whole program so you better avoid it
const is a constant so you use it to variables that are fixed and you dont want to change their values
let is for block level which means you can put inside of a function a loop etc.. and also it is used
for varaibles that you want to change or reasign their values.

also if you want to call function events always use an eventlistner dont put the name of the function
in the html and just write directly here it is not recommanded

for in & for of notew:
* for..in loops iterate over the entire prototype chain, which is virtually never what you want,
* Use Object.{keys,values,entries}, and iterate over the resulting array.

* The body of a for-in should be wrapped in an if statement to filter unwanted properties from the prototype.

* iterators/generators require regenerator-runtime, which is too heavyweight for this guide
*.to allow them. Separately, loops should be avoided in favor of array iterations.

variables should always be declared in the top of the script

cookies and validation are not to do with js cause it is
easily intercepted with a proxy intercepter (hacking tool) so u should be aware of that.
*/

/* arrays, numbers & strings functions */
/*
number : convert the element to a number (integer)
parseInt : convert the element to an integer
String : change the element to a string
toFixed : shorten a float to a fixed integer
typeof : returns the datatype of the element
Boolean : false(0 or Nan : not a number) , true

min,max,charAt,indexOf, Math.random().

string.replace("Omar","amin");  // changing the given string in the 1st parm by the 2cd param
string.trim(); // delete trim spaces from the start to the end
string.split(separator, limit) : lastName.split("/",2) split the string to words with / separting
them and only take the 2 first elements only
string.repeat(num) : repeat the string
string.substr(startindex,numberofcharacters) : returns part of a str
string.subString(startindex,endindex) : returns part of a str

array.push(x) : // add an element to the end
array.pop() : // remove the last element and returns it
array.shift() : // remove the first element of the array and return it
array.unshift(x) : add element to the begininng of the array and retun its length
array.reverse(); // Returns the array reversed
array.sort(); // Returns the array sorted
array.concat(arr2); // Join 2 arrays
array.join(" "); // Converts array into a string and split the words with a space
array.slice(0,2); // Returns part of an array same functionalty of substring

array.splice(startIndex, howManyItemsUwantToDelete,replacableitem1,replacableitem2...) :
can delete & insert items in an array

array.splice(0,3); // remove items(splice) from the index 0 the 3 next elements

array.splice(0,3,9,10,11); // this will replace the 3 elements from the start
with the rest of the elements given after

*/
// events
/*
    ondblclick : ondblclick
    onmouseover : mousehover
    onmouseout : mouse leave
    onresize : when u resize the browser
    onload : when the page loads
    onBlur : when u get out of the element
    onFocus : when u r in the element (using it)
    onChange : if you changed the default behavior of the element selected it will work
    OnAbort - Called when a page load is interrupted
    OnError - Called when an error occurs during page load
    OnKeyDown - When key is pressed but not released
    OnKeyUp - When key is released
    OnMouseUp - When mouse button is released
    OnReset - When reset button is clicked
    OnSelect - When text is selected
    OnSubmit - When submit button is clicked
    OnUnload - When user leaves a page
    */

/* DOM :
innerHTML its a complete tag "<p>ccc</p>"" while textContent its the object of the tag the corp "ccc" ,
oncontextmenu when you enter into input

lets say we have this <div> <p>x<f> <br> <i>y</i> </div>

parentNode : the parent element here is the div if we dont have nothing then it is the body
firstChild : p , lastChild : i, childNodes[0 - n] : p br (which means even the spaces are counted) i ,removeChild
nextElementSibling,previousElementSibling
insertBefore(beforethis, insertThis), insertAfter(afterthis, insertThis)
nodeValue,
createElement,createTextNode => appendChild : when we create an element to make him alive in the page we append

alert(img[0].src);  : quick tip alert of the value of the source

lien[0].setAttribute('href', 'https://www.facebook.com'); : modify a certain attribut
lien[0].getAttribute('href'); : to get the value of a specific attribut

e.preventDefault() :
it tells the browser that if there is a default behavior for this event on this object, then skip that default behavior.

So, for example, if you had a submit button that the default
behavior was to submit a form and you had a click handler on that button that did a preventDefault(),
then the browser would not submit the form when the button was clicked.
 A classic use of this might be when the form doesn't validate so you show the user an error message
and don't want the form to be submitted to the server.

Or another example. If you set up a click handler for a link and you call e.preventDefault()
in that click handler, then the browser will not process the click on the link and will not follow the href in the link.

setTimeout  : setTimeout(function(){	d.style.backgroundColor="red"; },500);
setInterval , ClearInterval  :   setInterval : x=setInterval(fonctionx,1000);  , clearInterval(x);

*/
/* cookies */
// Cookies are used to store information on the clients hard drive
// You can only access the information you stored on the clients machine
// You can’t access other websites cookies
// Cookies contain a name, value, expiration, directory that can access it and the domain that can access it

const escapedChars = '" \' \\ \t \n'
const lastName = 'hammou'
const firstName = `Amine ${lastName}`
let vehicules = { amine: 'cat', hammou: 'dog', kacem: 'mouse' }
const arr = [3, 4, 6, 2, 1, 5]
// const multiArray = [[1, 2, 3, 4, 5], [6, 7, 8, 9, 10]];
const state = 'blida'
// conditional operator (x) ? y : z
// condition is x if true ? do this : else do this
const testConditional = 4 < 10 ? '4 is less' : '4 is big'

const regex = /[A-Za-z0-9.-_]+@[A-Za-z]+\.[A-Za-z]{2,3}/
// /regex/g that g means iterates all the regex founded
const email = 'amine.kacem98@gmail.com'
const divide = document.formx.num2

let keyClicked = 0
let mouseX = 0
let mouseY = 0
// we did a funcrion down there that logs all the mouvement of the mouse and keys so we will change
// the default attitude of these special functions to reasign them those collected values
document.onkeypress = keyPressed
document.onmousemove = mousePos
document.onmousedown = mouseClicked

document.write(`${escapedChars} the length is ${escapedChars.length}`)
document.write(`<br>${firstName.substring(6, firstName.length)}`)
document.write(
  `<br> index of ${lastName.charAt(4)} is ${lastName.indexOf('o')}`
)
document.write(`<br> testing with the conditional op ${testConditional}<br>`)
document.write(
  `<br /> Random num 1 - 10 ${Math.floor(Math.random() * 10) + 1} <br />`
)

// switch statement
switch (state) {
  case 'affroun':
    document.write('wrong <br>')
    break
  default:
    document.write('default option <br>')
    break
}
let num = 1
while (num < 10) {
  if (num === 4) {
    break
    // break get out of the loop while completely without coming back
  }
  num++
  continue
  // continue get out of everything except the loop it will ignore what is down and get back from the while start
}

// it will sort the array from 1 2 3 4 5 6 and then it will log out the elements that were deleted
console.log(
  `we deleted these ${arr.sort().splice(0, 3)} the new array is ${arr}`
)
// so now we will work with the new arary 4 5 6 and then we will log out the items we wanna replace
console.log(
  `we will replace these ${arr.splice(0, 3, 9, 10, 11)} the new array is ${arr}`
)

/* for in & for of */
document.write('<br> for in loop down here <br>')

// for in iterates the key or the indice of the element not the value so i here represents amine , hammou , kacem
for (const i in vehicules) {
  document.write(`<br> the key is ${i} & the value is ${vehicules[i]} <br>`)
}
document.write('<br> second exemple for in <br>')
// for in iterates the key or the indice of the element not the value so i here represents 0,1,2 etc...
for (const i in arr) {
  document.write(
    `<br> the index of the array ${i} & its real value ${arr[i]} <br>`
  )
}

document.write('<br> for of loop down here <br>')

// for of iterates the value of the element so i here represents the real value of arr not the indice
for (const i of arr) {
  document.write(`<br> th value of a simple array ${i} <br>`)
}

document.write('<br> second exemple for of <br>')
// there is a trick in a for of of an array of key value is that of you iterate it just like the 1st expl
// it wont work so in this case you need a heigher order function (es6) called map to create a key value array
// that for of can iterate and here is how to do that

vehicules = new Map([['1', 'foo'], ['2', 'shoot']])
// with this for of will give you the key and the value both
for (const i of vehicules) {
  document.write(`<br> the key with the value is ${i} <br> `)
}
// if we want to get deeper with it so that we wanna precise the key alone or the value alone we do this
for (const [key, value] of vehicules) {
  document.write(`<br> the key is ${key} & the value is ${value} <br> `)
}

/* mouse keyboard position and clicked value trick */

// here we are testing if the browser is internet explorer
const mie = navigator.appName === 'Microsoft Internet Explorer'
if (!mie) {
  // Specifies that you want all mouse movement events passed to the document
  document.captureEvents(Event.MOUSEMOVE)
  document.captureEvents(Event.MOUSEDOWN)
}

function mousePos(e) {
  if (!mie) {
    // here we assing the x,y mouvement of the mouse in the page we are in
    mouseX = e.pageX
    mouseY = e.pageY
  }
  // and then we target the form with its name and then the input of the mouse and modify its value
  document.formx.formMouseX.value = mouseX
  document.formx.formMouseY.value = mouseY
  return true
}
// event.which returns 1 2 for the clicked mouse event (left ,right)
// event.charCode returns the charCode of the keyboard so we need to convert it to a real letter
function keyPressed(e) {
  if (!mie) {
    keyClicked = String.fromCharCode(e.charCode) // Converts char code to character
  }
  if (keyClicked) {
    document.formx.formKeyboardPress.value = keyClicked
    return true
  }
  return false
}

function mouseClicked(e) {
  if (!mie) {
    switch (e.which) {
      case 1:
        document.formx.formMousePress.value = 'Left'
        break
      case 2:
        document.formx.formMousePress.value = 'Middle'
        break
      default:
        document.formx.formMousePress.value = 'Right'
        break
    }
    return true
  }
}

// what the function is doing is that first it changes the visibility of the paragraphe whethere
// is hidding or visible conditonaly through checking the checkbox
// if its checked or not with the conditional operator
function showFirstPar() {
  document.querySelector('p').style.visibility = document.formx.check1.checked
    ? 'visible'
    : 'hidden'
}
// change the text of h3 by using the firstchild
// and the only child of h3 is the text and the text itself is the nodevalue
function changenode() {
  document.querySelector('h3').firstChild.nodeValue = 'you are over me'
}
// changing the inner html meaning the the html of the text inside the h3 and concatinating it with +=
function changehtml() {
  document.querySelector('h3').innerHTML += ' and goodbye world'
}

// lets play a litle bit with node elements

document.querySelector('div').addEventListener('click', nodeFunction)
function nodeFunction() {
  const div = document.querySelector('div')
  const hr = document.createElement('hr')
  const text = document.createTextNode('here is a last text added xd')
  div.firstChild.nodeValue = 'hello world im the div itself'
  // for some reason childnodes.value will not let
  // you change the original value so you have to remove the original child and then use it
  div.removeChild(div.childNodes[1])
  div.childNodes[1].nodeValue = ' hello world im the new bold '
  div.removeChild(div.childNodes[2])
  div.removeChild(div.lastChild)
  div.appendChild(text)
  div.appendChild(hr)
}

/* Regex its basicly like every other lang just the methods are different */

document.write(`${email.match(regex)} <br>`) // it will give you the index of the match
document.write(`${email.search(regex)} <br>`) // boolean search
document.write(`${email.replace(regex, 'amine.kacem2015@gmail.io')} <br>`)
document.write(`${regex.test(email)} <br>`) // test if the email is aquirent to the regex

/* validation of an email through an input and a span to log */

// this function basicly just check if there is anything on the span area then it empty it to log the text we want
function emptySpan(spanId) {
  if (spanId != null)
    // while there is an element(child) delete it
    while (spanId.firstChild) spanId.removeChild(spanId.firstChild)
}
// this is the main function that do all the work it checks the regex of the input (email)
// & it logs out the error text into the span.
function nodeTextLog(regEXP, input, spanId, text) {
  // we test that the input value is a wrong email
  if (!regEXP.test(input)) {
    // if there is value in the span then we delete it
    // then we log the error message
    emptySpan(spanId)
    spanId.appendChild(document.createTextNode(text))
    return false
  }
  // there is no error so we just
  // delete the span without loging the error
  emptySpan(spanId)
  return true
}
// then we simply call that function with our error msg we can also
// use it with validating number or idk we just change the regex and the msg lol
function validateEmail(input, spanId) {
  return nodeTextLog(regex, input.value, spanId, 'your email is wrong')
}

/* error handling */

divide.addEventListener('blur', dividingByZero)

/* so this function basicly do the division and handles the error that comes from it
and we gonna use the span to either launch an error message or just show the divison result */

function dividingByZero() {
  const spanID = document.getElementById('answer')
  const num1 = document.formx.num1.value
  const num2 = document.formx.num2.value
  // we use try to do our code and catch to handle the error
  try {
    if (!num1 || !num2) throw new Error('please put values')
    else if (num2 === 0) throw new Error('you cant devide on zero')
    // isNan : boolean function that verifs if it is a number
    else if (isNaN(num1) || isNaN(num2))
      throw new Error('please enter a real number')
    // like before we delete anything in the spanid
    emptySpan(spanID)
    // then if everything is correct we echo out the correct answer
    spanID.appendChild(document.createTextNode(num1 / num2))
  } catch (errorMsg) {
    // like before we delete anything in the spanid just in case
    emptySpan(spanID)
    // then we just echo the error msg
    spanID.appendChild(document.createTextNode(errorMsg))
  }
}
// cookies

// function getcookie :  to get cookies we need the dom document.cookie then we split them into an array to verify
// if the input value is equals to a cookiename if so then we trim the white spaces from the cookie data
// then grab the cookie of the input name.
document.formx.getcookie.addEventListener('blur', () => {
  // the cookie name we want to look for
  const cookiename = document.formx.getcookie.value
  // all the cookies saved in the dom
  // we split them to get a better look on a defined array of cookies
  const allcookies = document.cookie.split(';')
  let match = ''
  let cookiedata = ''
  for (let i = 0; i < allcookies.length; i++) {
    // we verify if the cookie name does exists in allcookies
    if (allcookies[i].indexOf(cookiename) !== -1) {
      // if true then we remove the extra white spaces
      match = allcookies[i].trim()
      // then get the cookiedate by taking a substring === cookiename from allcokies
      // +1 is to avoid the =
      cookiedata = match.substr(cookiename.length + 1)
      alert(`${cookiename} ${cookiedata}`)
    }
  }
})

document.formx.namecookie.addEventListener('blur', createcookie)

// remember a cookie contain : name ,value , expirationdate,
// path(if it starts with a dot . means the subfolders/files are included to the cookie), domain
// expl : cookiename=firstname;path=./var/lib;expires=12 JAN 2019;
// so this function will get the cookievalue and create a date and assing it to document.cookie simple as that
function createcookie(cookiename) {
  const cookievalue = document.formx.namecookie.value
  cookiename = 'firstname'
  // cookiename = document.formx.namecookie;
  // we get the current date then we set the month value to 1 month ahead
  // then convert it to a GMTstring (localtime writing cookie default GMT)
  const expirationDate = new Date()
  expirationDate.setMonth(expirationDate.getMonth() + 1)
  document.cookie = `${cookiename}=${cookievalue};path=/;expires=${expirationDate};`
}

// function delete cookie : this function locate the cookie with the name remve the value and expires the date
document.formx.deletecookie.addEventListener('blur', () => {
  const cookiename = document.formx.deletecookie.value
  // a trick to delete a cookie we call the create cookie function
  // the first param is the new name to delete , the second we empty up the cookievalue ,
  // the third we changeback the date to expire it
  return createcookie(cookiename, '', -1)
})

console.log(document.cookie)
document.write(`<h3> here is your cookies : ${document.cookie} </h3>`)

/* AJAX
   we get the http request then if its ready (meaning the readystate === 4 )
     and the satuts is 200 (http refers to ok) we do what we want
     then we send the request to our URL by opening the url
     and telling it what http method to use
     xmlhttp = new XMLHttpRequest()
     xmlhtp.onreadystatechange = () => {
             if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                your code
             }
     }
      xmlHttp.open( "GET", `URL`,true);
      xmlHttp.send();
*/

/* OOP */

// constructor
function Animal() {
  this.name = 'start name'
  this.sound = 'grrr'
  this.owner = 'start owner'
}
// set a method that the animal class will always use and its called a prototype

Animal.prototype.setOwner = function(newOwner) {
  // we are checking of the variable newowner if it is not undefined then we assign it to this.owner
  // its called a setter
  return typeof newOwner !== 'undefined'
    ? (this.owner = newOwner)
    : alert('please enter a valid owner')
}
// same thing for the getter
Animal.prototype.getOwner = function() {
  return this.owner
}
// what encapsulation means is that to access any // attribute in the constructor u have to acces
// them through the setters and getters

const Dog = new Animal()
Dog.setOwner('hammou')
document.write(`${Dog.getOwner()} <br>`)

// inheritance is adding subclass cat that inherit the same attrbts and methods from the superclass animal

function Cat() {
  // animal calls this of the cat to add it as a subclass
  Animal.call(this)
  this.mode = 'happy'
}
// then this is to let cat knows that the superclass is Animal
Cat.prototype = new Animal()

// then we need to create the constructor of the class cat just like this
Cat.prototype.constructor = Cat()

// after this u can add setters and getters for car

const sophie = new Cat()
const instance = sophie instanceof Cat
document.write(instance)

// method overloading : create methods inside of methods and add 2 3 more attributs to overload it
/*
  Cat.prototype.setStuff = function(newName, newOwner, newMode) {
    if (
      typeof newName !== 'undefined' &&
      typeof newOwner !== 'undefined' &&
      typeof newMode !== 'undefined'
    ) {
      Cat.prototype.setStuff = function(newName, newOwner, newMode) {};
    }
  };
*/

// polymorphisme
/*
function DoAnimalStuff (Animal){
  document.write(Animal.getOwner());
}
function DoAnimalStuff (Cat){
  document.write(Cat.getOwner());
}
*/

/****  ERROR HANDLING WITH WES BOS ASYNC AWAIT *****/

// using catch out side the function
 go().catch(e => console.error(e));

// create a custom function to check for errors without a try and catch block

// make a function to handle that error
function handleError(fn) {
  return function (...params) {
    return fn(...params).catch(function (err) {
       // do something with the error!
      console.error(`Oops!`, err);
    });
  }
}

// Wrap it in a HOC

const handleError = fn => (...params) => fn(...params).catch(console.error)
const safeVerif = handleError(passportVerif)
// module.exports = safeVerif
safeYolo();

  // Start with a regular Route where an error could happen
    const getOrders = async (req, res, next) => {
      const orders = Orders.find({ email: req.user.email });
      // Something Goes Wrong
      if (!orders.length) throw Error('No Orders Found');
    }
    const getOrders = async (req, res, next) => {
      const orders = Orders.find({ email: req.user.email });
      // Something Goes Wrong
      if (!orders.length) throw Error('No Orders Found');
    }
    next('No Orders Found!');
    // passes this along to the next middleware function
    // Since this unhandled, this route would case the app to quit
    router.get('/orders', catchErrors(getOrders));
    const displayErrors = async (error, req, res, next) => {
      res.status(err.status || 500);
      res.render('error', { error });
    }
    // any time we call next('Something Happened') displayErrors will kick in
    app.use(displayErrors);
    const catchErrors = (fn) => {
      return function (req, res, next) {
        return fn(req, res, next).catch(next);
      };
    };
    // or Hot Shot
    const catchErrors = (fn) =>
      (req, res, next) => fn(req, res, next).catch(next)
    async function loadData() {
      const wes = await axios.get('...');
    }
    loadData.catch(dealWithErrors);
    process.on('unhandledRejection', error => {
      console.log('unhandledRejection', error);
    });