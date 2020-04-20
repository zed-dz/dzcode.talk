# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# https://docs.scrapy.org/en/latest/topics/items.html

import scrapy


class AnnuaireItem(scrapy.Item):
    # define the fields for your item here like:
    etp = scrapy.Field()
    siege = scrapy.Field()
    email = scrapy.Field()
