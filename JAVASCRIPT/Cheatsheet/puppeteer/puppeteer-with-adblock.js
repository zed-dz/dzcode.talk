'use strict'

const puppeteer = require('puppeteer');

(async () => {
  /* PRECONDITION:
    0. download ublock, I used https://github.com/gorhill/uBlock/releases/download/1.14.19b5/uBlock0.chromium.zip
    1. run $PATH_TO_CHROME --user-data-dir=/some/empty/directory --load-extension=/location/of/ublock
    2. enable block lists you want to use
    */

  const ext = '/Users/ckanich/Downloads/uBlock0.chromium'
  const datadir = '/Users/ckanich/Downloads/profile/'
  // Doesn't work with headless: false, my guess is that ublock
  // (or every extension?) breaks if it can't show its menu button
  const browser = await puppeteer.launch(
    {
      headless: false,
      userDataDir: datadir,
      args: [`--disable-extensions-except=${ext}`, `--load-extension=${ext}`]
    })
  const page = await browser.newPage()
  // First load will show ads and I have no idea why:
  await page.goto('https://www.bing.com/search?q=web+hosting')
  // Give ublock time to load its settings or something?
  // Without this wait next page ends up with ads too
  await page.waitFor(2500)
  // This page will not show ads:
  await page.goto('https://www.nytimes.com')
  // Wait for the page to actually render everything
  await page.waitFor(5000)
  await page.screenshot({ path: 'nyt-without-ads.png', fullPage: true })
  await browser.close()

})()
