const apiKey =
  '45f7a5210c9a4f2bcba7438ea1d65f3c959502f211011ab634276f7d034fe32d'

const imageContent = document.querySelector('.image-content')

/* The async await way : we fetch random images (max count is 30) */
const getImages = async () => {
  try {
    // We fetch firstly the response(the url of the api with their api key) then the images data
    const response = await fetch(
      `https://api.unsplash.com/collections/3732249?random&per_page=44&client_id=${apiKey}`
    )
    // `https://api.unsplash.com/photos/random?count=28&client_id=${apiKey}`
    // 'http://127.0.0.1:5500/images/'
    // const rand = myArray[Math.floor(Math.random() * myArray.length)];
    // the data is a json formated
    const data = await response.json()
    console.log(data)
    // Results contain the data of images its a specific data go check console.log(data)
    let output = ''
    ;[...data].forEach(image => {
      output = `<img src="${image.cover_photo.urls.regular}">`
      imageContent.innerHTML += output
    })
  } catch (error) {
    throw new Error(`${error}`)
  }
}

// Run the function when the window loads
if (window) {
  window.addEventListener('load', getImages)
}

/* The pormises way : we fetch specific search results */

// if (div) {
//   div.addEventListener("click", () => {
//     fetch(`https://api.unsplash.com/search/photos?query=chicago&per_page=50&client_id=${apiKey}`)
//       .then(response => response.json())
//       .then(data => {
//         data = data.results;
//         let output = "";
//         data.forEach(image => {
//           if (image.width > image.height) {
//             output = `<img src="${image.urls.regular}">`;
//             imageContent.innerHTML += output;
//           }
//         });
//       })
//        .catch(err => {
//          console.error(`${err}`);
//        })
//   });
// }
