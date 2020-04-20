// __filename, __dirname built in

import url from 'url'

// const URL = require('url').URL;
/* NOTE: if you are using v6 (LTS), line 1 gives errors,
 *   if you get an error saying, TypeError: URL is not a constructor,
 *  comment line 1, and uncomment line 2 */

// commonjs syntax import from is a new feature in nodev12
// (experimental so use esm for now )it was a require based syntax
// const path = require('path')
import path from 'path'
import os from 'os'
import fs from 'fs'
import event, { EventEmitter } from 'events'
import http from 'http'
import uuid from 'uuid'

import Person from './basic/person'

// output the directory path of the file
console.log(path.dirname(__filename))
// both of htese output the extension of the file .js
console.log(path.basename(__filename).slice(-3) == path.extname(__filename))
// concatinate the current path to /public/indew.html
console.log(path.join(__dirname, 'public', 'index.html'))
// outputs the path object nicely formatted with root , dir , base , ext , name objects
console.log(path.parse(__filename))
// Returns a path string from an object (so i gave it the parse func as an obj) the opposite of parse.
console.log(path.format(path.parse(__filename)))
// output the delimiter / \ ; etc...
console.log(path.delimiter)
// Home dir
console.log(os.homedir())
// Platform
console.log(os.platform())
// CPU Arch
console.log(os.arch())
// CPU Core Info
console.log(os.cpus())
// Free memory
console.log(os.freemem())
// Total memory
console.log(os.totalmem())
// Uptime
console.log(os.uptime())

const site = new URL('https://www.codetalk.com:8000?id=100&statut=active')
// output the full link (both of em)
console.log(site.href == site.toString())
// the root path of the site / , /home , etc...
console.log(site.pathname)
// output the domaine name with the port
console.log(site.host)
// output the domaine name without the port
console.log(site.hostname)
// search query string
console.log(site.search)
// search param query object
console.log(site.searchParams)
// adding params query to the url
site.searchParams.append('name', 'code')
console.log(site.searchParams)
// looping through them with foreach
site.searchParams.forEach((value, key) => {
  console.log(`${value} : ${key}`)
})

// an eventemitter helps creating a custom event
// class something extends eventEmitter
// add to it custom methods then initial an emitter (this.emit => string + callback )
// with a custom name for your event initial an instance of it and use 'on'
// to start the event listening and after just use yourCustomMethod
class MyEmitterLogger extends EventEmitter {
  log(msg) {
    // init event
    this.emit('myEvent', { id: uuid.v4(), msg })
    // msg without a value in object is the same as msg:msg
  }
}

const ee = new MyEmitterLogger()

// trigger event listenner
ee.on('myEvent', data => console.log('called listnener', data))

// trigger event custom methods

ee.log('hello world')
ee.log('this is a logger')
ee.log('somewhere somehow')

// u can also use it directly from the emit built in function
// ee.emit('myEvent')

// build an http server ( not recommended in nodejs use express )
/*
 * first its an http request so u need to work with requests and responds
 * the server will serve a specific location of a folder (url)
 * so req.url will check if its root then we server index.html else we serve
 *  another file and so on (thats way its better in express to stop the if if if loop)
 * then we read that file we check for errors we write
 *  the headers ( post request => statusError + contentType ) then
 *  we server the content of that page with res.end (content, encoding)
 */

const server = http.createServer((req, res) => {
  let filePath = path.join(
    __dirname,
    'public',
    req.url === '/' ? 'index.html' : req.url
  )
  // filepath = __dirname/public/index.html || __dirname/public/anything.anything (req.url)
  const filePathError = path.join(__dirname, 'public/404.html')
  const extname = path.extname(filePath)
  let contentType = 'text/html'
  switch (extname) {
    case '.js':
      contentType = 'text/javascript'
      break
    case '.json':
      contentType = 'application/json'
      break
    case '.css':
      contentType = 'text/css'
      break
    case '.png':
      contentType = 'image/png'
      break
    case '.jpg':
      contentType = 'image/jpg'
      break
    // this check will find if there is a file without an extensions it will
    // rederict it to req.url so to the error page
    case '' && contentType === 'text/html':
      filePath = '.html'
      break
    default:
      contentType = 'text/html'
  }
  // the end results thats logged on the screen is in res.end(data, encoding)
  const encoding = 'utf-8'
  fs.readFile(filePath, (err, data) => {
    if (err) {
      // if the path is not found error then we redirect to our html error page
      if (err.code === 'ENOENT') {
        fs.readFile(filePathError, (error, content) => {
          // we make 200 http status to server an error html page that exists
          // write the headers (post request) => http code + contenttype object
          res.writeHead(200, { 'Content-Type': contentType })
          res.end(content, encoding)
        })
      } else {
        // 500 error in the server
        res.writeHead(500)
        res.end(`Server Error : ${err.code}`)
      }
    } else {
      // sucess http statut 200
      res.writeHead(200, { 'Content-Type': contentType })
      res.end(data, encoding)
    }
  })
})
// we do this check because when we deploy our application the host will probably not use 5000 as a port
const PORT = process.env.PORT || 5000
server.listen(PORT, () => {
  console.log(`server started!.. on ${PORT}`)
})

// const server = http.createServer((req, res) => {
// if (req.url === '/') {
//   fs.readFile(
//     path.join(__dirname, 'public', 'index.html'),
//     (err, content) => {
//       if (err) throw err;
//       res.writeHead(200, { 'Content-Type': 'text/html' });
//       res.end(content);
//     }
//   );
// }

// if (req.url === '/api/users') {
//   const users = [
//     { name: 'Bob Smith', age: 40 },
//     { name: 'John Doe', age: 30 }
//   ];
//   res.writeHead(200, { 'Content-Type': 'application/json' });
//   res.end(JSON.stringify(users));
// }
//

/* files management */

// WRITE THE FOLLOWING USERS NAME IN  A FILE  AND THEN DISPLAY THEM
const users = [
  { name: 'Kaddy' },
  { name: 'Marc' },
  { name: 'Prince' },
  { name: 'Kally' }
]

// create folder
/*
fs.mkdir(path.join(__dirname, '/fsfolder2'), {}, err => {
  if (err) throw err

  console.log('Folder created ...')

  // create file and write json data
  fs.writeFile(
    path.join(__dirname, '/fsfolder2', 'name.json'),
    JSON.stringify(users),
    err => {
      if (err) throw err

      console.log('File created and data written ...')

      // read file
      fs.readFile(
        path.join(__dirname, '/fsfolder2', 'name.json'),
        'utf8',
        (err, userData) => {
          if (err) throw err

          // display user name
          JSON.parse(userData).forEach(user => {
            console.log(user.name)
          })

          // display successful message
          console.log('Users name displayed ...')

          // rename the file
          fs.rename(
            path.join(__dirname, '/fsfolder2', 'name.json'),
            path.join(__dirname, '/fsfolder2', 'users.json'),
            err => {
              if (err) throw err

              // display successful message
              console.log('File rename completed ...')
            }
          )
        }
      )
    }
  )
})
// delete a folder
// NOTE : you must create a folder named "myFolderToDelete".
// NOTE : myFolderToDelete must be an empty folder.
fs.rmdir(path.join(__dirname, '/fsempty'), err => {
  if (err) throw err

  console.log('Folder deleted ...')
})
*/
// create a folder with mkdir it takes the directory path of the new folder + an object + callback
/*
fs.mkdir(path.join(__dirname, '/fsfolder'), {}, err => {
  if (err) throw err
  console.log('folder created...')
})
*/
// create and write to a file path to the
// pathfile (pathjoin(dirname,folder,namefile) ) + text + callback

/* another example with json data
  path.join(__dirname, '/fsfolder2', 'name.json'),
  JSON.stringify(users),
*/

/*
fs.writeFile(
  path.join(__dirname, '/fsfolder','fsfile.txt'),
  'hello world!',
  err => {
    if (err) throw err
    console.log('file created and written to it...')
  }
)
*/
// append text
/*
fs.appendFile(
  path.join(__dirname, '/fsfolder/fsfile.txt'),
  ' this an appened text;',
  err => {
    if (err) throw err
    console.log('adding extra text...')
  }
)
*/
// read file path + typeofcontent (utf8,json,ascii ..) + callback
/*
fs.readFile(
  path.join(__dirname, '/fsfolder/fsfile.txt'),
  'utf8',
  (err, data) => {
    if (err) throw err
    console.log(data)
  }
)
*/
// rename file : path + newpath with new name + callback
/*
fs.rename(
  path.join(__dirname, '/fsfolder/fsfile.txt'),
  path.join(__dirname, '/fsfolder/fsfilerenamed.txt'),
  err => {
    if (err) throw err
    console.log('file renamed...')
  }
)
*/

// nodejs has module.export function that helps on getting code from other js files like
// for expl we have a class person in person.js w can send it anywhere by module.export
// and retrieve it by a require

/* /basic/person.js file containts this
class Person {
  constructor(name, age) {
    this.name = name
    this.age = age
  }

  getName() {
    return `My name is ${this.name}, I'm ${this.age} years old.`
  }
}
// it helps reuse the person class anywhere in other files
module.exports = Person
*/
const person = new Person('amine hammou', 26)
// console.log(person.getName())
