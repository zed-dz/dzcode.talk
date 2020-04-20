import sqlite3

con = sqlite3.connect('quotes.db')
curr = con.cursor()

curr.execute(""" create table quotes_tb(
  title text,
  author text,
  tags text
  )""")
curr.execute(
    """insert into quotes_tb values("this is a title", "amine is the athor","and tag it is")""")

con.commit()
con.close()
