import scrapy
from scrapy.http import FormRequest
from ..items import QuotetutorialItem
from scrapy.utils.response import open_in_browser
# from scrapy.crawler import CrawlerProcess

# scrapy startproject tutorial
# scrapy crawl quotes
# scrapy crawl session
# scrapy shell "http://quotes.toscrape.com"
# scrapy crawl quotes -o data.json/csv/xml
# scrapy genspider generalspider amazon.com
# pip install pymongo
# pip install scrapy-user-agents
# pip install scrapy-proxies-tool
# pip install scrapy_proxy_pool


class QuoteSpider2(scrapy.Spider):
    name = 'quoteswithlogin'
    start_urls = ['http://quotes.toscrape.com/login']

# inspect element => network tab => touch login button => capture the first request => go to header => down to csrf token
# capture the login and then start scrap, if sucess then it redirects to 302
    def parse(self, response):
        token = response.css("form input::attr(value)").extract_first()
        return FormRequest.from_response(response, formdata={
            'csrf_token': token,
            'username': 'admin',
            'password': 'password'
        }, callback=self.start_scraping)

    def start_scraping(self, response):
        # this is gonna open the webpage inside our browser when the crawler lunch and the login turns logout
        open_in_browser(response)
        item = QuotetutorialItem()
        divs = response.css("div.quote")
        for quote in divs:
            title = quote.css("span.text::text").extract()
            author = quote.css(".author::text").extract()
            tags = quote.css(".tag::text").extract()
            item['title'] = title
            item['author'] = author
            item['tags'] = tags
            yield item


class QuoteSpider(scrapy.Spider):
    name = "quotes"
    page_number = 2
    # page_number = 11501
    start_urls = [
        # 'http://quotes.toscrape.com'
        'http://quotes.toscrape.com/page/1/'
        # "http://www.annuairesdz.com/SearchResult/Details/11500/"
    ]

    def parse(self, response):

        item = QuotetutorialItem()
        # title = response.css('title::text').extract_first()
        # firsttitle = response.css('title::text')[0].extract()
        # firstquote = response.css('span.text::text')[1].extract()

        # liwithclassnextcontainsawithhref = response.css("li.next a").xpath("@href").extract()
        # allaswithhref = response.css("a").xpath("@href").extract()
        # response.css("title::text") == response.xpath("//title/text()")
        # spanfirsttext = response.xpath("//span[@class='text']/text()")[1].extract()

        # all_div_quotes = response.css("div.quote span.text::text").extract()
        # all_authors = response.xpath(
        #     "//div[@class='quote']//span//small[@class='author']/text()").extract()
        # all_tags = response.css("div.quote div.tags a.tag::text").extract()

        divs = response.css("div.quote")
        for quote in divs:
            title = quote.css("span.text::text").extract()
            author = quote.css(".author::text").extract()
            tags = quote.css(".tag::text").extract()

        # the field of the items
        item['title'] = title
        item['author'] = author
        item['tags'] = tags

        # yield{'Quotes': title, 'Authors': author, 'Tags': tags}
        yield item

        # this will get the attribute number of an hrref of a link for example http://abcd.com/page/1 it will return 1 you can find it when u do inspect elemnet on a pagination list

        # next_page = response.css("li.next a::attr(href)").get()

        next_page = 'http://quotes.toscrape.com/page/' + \
            str(QuoteSpider.page_number) + '/'

      # if next_page is not None:
        if QuoteSpider.page_number < 11:
            QuoteSpider.page_number += 1
            yield response.follow(next_page, callback=self.parse)


# in order to crawl both spiders simultanously or if you want to pick one of them just comment the other one below here
# process = CrawlerProcess()
# process.crawl(QuoteSpider)
# process.crawl(QuoteSpider2)
# process.start()  # the script will block here until all crawling jobs are finished

#  def parse(self, response):
#         hxs = HtmlXPathSelector(response)
#         links = hxs.select('//a')
#         for link in links:
#             url = ''.join(link.select('./@href').extract())
#             relevant_urls = re.compile(
#                 'http://www\.jokes4us\.com/yomamajokes/yomamas([a-zA-Z]+)')
#             if relevant_urls.match(url):
#                 yield Request(url, callback=self.parse_page)

#     def parse_page(self, response):
#         hxs = HtmlXPathSelector(response)
#         categories = stripcats(hxs.select('//title/text()').extract())
#         joke_area = hxs.select('//p/text()').extract()
#         for joke in joke_area:
#             joke = stripjokes(joke)
#             if len(joke) > 15:
#                 yield JokeItem(joke=joke, categories=categories)
