import requests
from bs4 import BeautifulSoup
import pandas as pd
from tabulate import tabulate

url = "https://www.mohfw.gov.in/"
page = requests.get(url)

content = page.content

soup = BeautifulSoup(content, "html5lib")

state_section = soup.find('section', attrs={'id':"state-data"})
cases_table = state_section.find('table')
rows = cases_table.find_all('tr')
headers = [header.text for header in rows[0].find_all('th')]
ap = []
for td in rows[1].find_all('td'):
  ap.append(td.text)
dict(zip(headers, ap))
elimination = [0,32,33]
def extract_row(row, header):
  data = [td.text for td in row.find_all('td')]
  return dict(zip(headers,data))
cases = []
for i, row in enumerate(rows):
  if i not in elimination:
    cases.append(extract_row(row, headers))
  else:
    pass

df = pd.DataFrame(data=cases)
df.columns = [0,1,2,3,4]
df = df[:-2]

# df.loc[31,4]=df.loc[31, 3]
# df.loc[31, 3]=df.loc[31, 2]
# df.loc[31, 2]=df.loc[31, 1]
# df.loc[31, 1] = "Total"
# df.loc[31,0]=""
df.drop(31,inplace=True)
df.loc[31,1] = "Total"
df.loc[31,2] = sum(list(map(float, df[2]))[:-1])
df.loc[31,3] = sum(list(map(float, df[3]))[:-1])
df.loc[31,4] = sum(list(map(float, df[4]))[:-1])
# df.sort_values(2,axis=0,ascending=False,inplace=True)
# print(list(map(float, df[2])))
# print(len(df[2]))
# print(df)
# print(tabulate(df, headers='keys', tablefmt='psql'))
df.to_csv('cases.csv', index=False)
