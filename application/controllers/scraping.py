from urllib.request import urlopen
from bs4 import BeautifulSoup

wiki_link = "https://en.wikipedia.org/wiki/Wikipedia"
html = urlopen(wiki_link).read()
soup = BeautifulSoup(html, 'html.parser')


categories_table = soup.find("div", {"id": "mw-normal-catlinks"})


for each in categories_table.findAll("li"):
    print(each.text)