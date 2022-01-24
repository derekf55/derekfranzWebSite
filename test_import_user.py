import os
import django

os.environ.setdefault("DJANGO_SETTINGS_MODULE", "dereksite.settings")
django.setup()

from account.models import User

import csv

with open('userinfo.csv') as csvfile:
    csvreader = csv.reader(csvfile)
    for row in csvreader:
        username = row[2]
        password = 'bcrypt$'+row[3]

        new_user = User(username=username,email=username,password=password)
        #new_user.save()