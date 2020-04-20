# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html


import sqlite3


class QuotetutorialPipeline(object):
    def process_item(self, item, spider):
        return item

# -*- coding: utf-8 -*-

# # Define your item pipelines here
# #
# # Don't forget to add your pipeline to the ITEM_PIPELINES setting
# # See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html


# # extracted data => temporary item containers => Pipelines => mongodb/sqlite/mysql database
# # activate it in the settings.py where 'ITEM_PIPELINES = {}'
# import mysql.connector
# import pymongo


class QuotetutorialPipeline(object):

    def __init__(self):
        self.create_connection()
        self.create_table()

    def create_connection(self):
        # sqlite3 connection
        self.conn = sqlite3.connect("myquotes_tb")
        self.curr = self.conn.cursor()
        # mysql connection
        # self.conn = mysql.connector.connect(
        #     host_=_'localhost',
        #     user_=_'root',
        #     passwd_=_'',
        #     database_=_'myquotes'
        # )
        # mongodb connection
        #  self.conn = pymongo.MongoClient(
        #   'localhost',
        #   '27017'
        # )
        # db=self.conn("myquotes")
        # self.collection = db["quotes_tb"]

      # create table for mysql/sqlit3
    def create_table(self):
        self.curr.execute(""" DROP TABLE IF EXISTS myquotes_tb""")
        self.curr.execute(""" create table myquotes_tb(
                              title text,
                              author text,
                              tags text
                              )""")

    def process_item(self, item, spider):
        # mongodb storedata ez
        # self.collection.insert(dict(item))
        # mysql/sqlite3 db store data
        self.store_db(item)
        return item

    def store_db(self, item):
        # replace ? %s in mysql
        self.curr.execute("""insert into myquotes_tb values(?, ?, ?) """, (
            item['title'][0],
            item['author'][0],
            item['tags'][0]
        ))
        self.conn.commit()
