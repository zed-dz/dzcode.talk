const puppeteer = require('puppeteer')

module.exports = async function (server) {
  const url = 'http://localhost:3000'

  // Open the browser
  const browser = await puppeteer.launch({
    // Run the browser headless or not
    headless: true
  })

  // Open a tab
  const page = await browser.newPage()

  // Set the referer. That is only needed if the server needs it for security reasons
  await page.setExtraHTTPHeaders({
    referer: url
  })
  await page.setRequestInterception(true)
  page.on('request', request => {
    request.continue()
  })

  // Defines where the file should be saved
  await page._client.send('Page.setDownloadBehavior', {
    behavior: 'allow',
    // Using a folder at the root to save the images
    downloadPath: '/export'
  })

  // Define the URL where the chart is
  await page.goto(url)

  // Run scripts in the page
  await page.evaluate(
    () =>
      // Make the evaluate callback wait until the export is done
      new Promise((resolve, reject) => {
        // Call the export on the chart
        chart.exporting.export('pdf').finally(() => {
          // Wait for the download to get done
          setTimeout(() => {
            resolve()
          }, 2000)
        })
      })
  )

  // Wait for the browser to close to stop the server
  browser.on('disconnected', async () => {
    // Stop the server
    await server.stop({
      timeout: 3000
    })
  })

  // Close the browser
  await browser.close()
}
