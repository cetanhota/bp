import sys
import matplotlib.pyplot as plt
import mysql.connector
import pandas as pd
import numpy as np

mydb = mysql.connector.connect(
  host="pi8gb.local",
  user="",
  auth_plugin='mysql_native_password',
  password="",
  database="health"
)
mycursor = mydb.cursor()
sql = "select sys,dia,pulse,DATE(ts) from bp order by ts asc;"
mycursor.execute(sql)
myresults = mycursor.fetchall()

df = pd.DataFrame(myresults, columns=['sys', 'dia', 'bp', 'ts']).set_index('ts')
df.columns=['SYS','DIA','Pulse']
ts = ['ts']
df.plot(xlabel='')

plt.title('\nBP 90 mins after meds.\n')
plt.xticks(rotation = 45)
plt.grid(True)
plt.legend()
plt.show()

mycursor.close()
mydb.close()
