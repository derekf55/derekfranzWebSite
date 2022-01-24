from django.db import models

# Create your models here.

class Processtorun(models.Model):
    command = models.TextField(db_column='Command')  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    server = models.TextField(db_column='Server')  # Field name made lowercase.
    args = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ProcessToRun'


class Homeautomation(models.Model):
    appliance = models.TextField(db_column='Appliance')  # Field name made lowercase.
    state = models.IntegerField(db_column='State')  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    name = models.TextField(db_column='Name', blank=True, null=True)  # Field name made lowercase.
    groupname = models.TextField(db_column='groupName')  # Field name made lowercase.
    type = models.CharField(db_column='Type', max_length=50)  # Field name made lowercase.
    userprivilege = models.CharField(db_column='userPrivilege', max_length=25)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'homeAutomation'


class Peoplehere(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)
    name = models.CharField(db_column='Name', max_length=30, blank=True, null=True)  # Field name made lowercase.
    hostname = models.CharField(max_length=255, blank=True, null=True)
    macaddress = models.CharField(db_column='MacAddress', max_length=100, blank=True, null=True)  # Field name made lowercase.
    timearrived = models.DateTimeField(db_column='TimeArrived')  # Field name made lowercase.
    resident = models.IntegerField(db_column='Resident')  # Field name made lowercase.
    last_updated = models.DateTimeField(db_column='Last_Updated')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'PeopleHere'


class Persondetectionpriority(models.Model):
    prioritylevel = models.CharField(db_column='PriorityLevel', max_length=50)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'personDetectionPriority'


class FileUpload(models.Model):
    file_field = models.FileField(upload_to='uploads')