# Import libraries
import numpy as np
import requests
import urllib.request
import time
from bs4 import BeautifulSoup

# start_urls = ['https://dz.kompass.com/en/c/sapeco-gmbh/ch153508.html']
# '//a[@class="coordonneesItemLink phoneCompany showMobile"]/text()').extract()
# 'a[@class="coordonneesItemLink phoneCompany showMobile"]/@href').extract_first()

# titles = soup.findAll("a", {"class": "result-title"})
# for title in titles:
# print(title.text)

# def get_random_ua():
#     random_ua = ''
#     ua_file = 'ua_file.txt'
#     try:
#         with open(ua_file) as f:
#             lines = f.readlines()
# if len(lines) > 0:
#             prng = np.random.RandomState()
#             index = prng.permutation(len(lines) - 1)
#             idx = np.asarray(index, dtype=np.integer)[0]
#             random_ua = lines[int(idx)]
#     except Exception as ex:
#         print('Exception in random_ua')
#         print(str(ex))
#     finally:
#         return random_ua
# Set the URL you want to webscrape from


# user_agent = get_random_ua()
user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36'
headers = {
    'user-agent': user_agent,
}
payload = {'api_key': 'fd1f6640c8111538d014ea108b7ee1b7',
           'url': 'https://dz.kompass.com/en', 'render': 'true'}
r = requests.get('http://api.scraperapi.com',
                 params=payload, timeout=60, headers=headers)

soup = BeautifulSoup(r.text, "html.parser")

# html = r.text.strip()
# print(r.status_code)
# print(html)
# print(soup)

# url = 'https://dz.kompass.com/searchCompanies'

# # Connect to the URL
# response = requests.get(url)

# # Parse HTML and save to BeautifulSoup object
# # print(soup)
# # To download the whole data set, let's do a for loop through all a tags

for i in range(36, len(soup.findAll('a'))+1):
    one_a_tag = soup.findAll('a')[i]
    link = one_a_tag['href']
    download_url = 'https://dz.kompass.com/c' + link
    urllib.request.urlretrieve(
        download_url, './'+link[link.find('/c/')+1:])
    time.sleep(1)  # pause the code for a sec
