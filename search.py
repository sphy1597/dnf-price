import requests
import json
from bs4 import BeautifulSoup
from urllib import parse
import pandas as pd

item = "진 미스트리스의 단발 "
encoding =  parse.quote(item)
apiurl = "https://api.neople.co.kr/df/auction?itemName=" + encoding + "&wordType=front&apikey=c5mNPM0xWNNvg9qBQv4HyBZQOXSfbfLb"
webpage = requests.get(apiurl)


soup = BeautifulSoup(webpage.content, "html.parser").text
df = pd.DataFrame(soup[8:-1])
print(df)

