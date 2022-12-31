#!/usr/bin/env python3
# -*- coding: cp1252 -*-

import sys
import matplotlib.pyplot as plt
import mysql.connector
import pandas as pd
import numpy as np
from getpass import getpass

mydb = mysql.connector.connect(
  host="",
  user="",
  password="",
  auth_plugin='mysql_native_password',
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

##plt.title('\nBP 90 mins after meds.\n')
plt.xticks(rotation = 45)
plt.grid(True)
plt.legend()
##plt.show()
plt.tight_layout()
plt.savefig('bp.png')

mycursor.close()
mydb.close()
