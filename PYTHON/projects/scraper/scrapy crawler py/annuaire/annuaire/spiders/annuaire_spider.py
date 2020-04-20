# -*- coding: utf-8 -*-
import scrapy
from scrapy.http import FormRequest
from ..items import AnnuaireItem


class AnnuaireSpiderSpider(scrapy.Spider):
    name = 'annuaire_spider'
    page_number = 10146
    start_urls = [
        'http://www.annuairesdz.com/SearchResult/Details/10145/']

    def parse(self, response):
        item = AnnuaireItem()

        divs = response.css('div.panel-default')
        for p in divs:
            etp = divs.css("h3::text").extract()
            siege = divs.css("td em+p::text").extract()

        p_tags = divs.css('td p+p')
        for blank in p_tags:
            email = blank.xpath(
                './following-sibling::text()[1]').get().strip()

        item['etp'] = etp
        item['siege'] = siege
        item['email'] = email
        yield item

        next_page = 'http://www.annuairesdz.com/SearchResult/Details/' + \
            str(AnnuaireSpiderSpider.page_number) + '/'

        if AnnuaireSpiderSpider.page_number < 20000:
            AnnuaireSpiderSpider.page_number += 1
            yield response.follow(next_page, callback=self.parse)
