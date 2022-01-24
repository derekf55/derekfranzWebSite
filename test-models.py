# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey and OneToOneField has `on_delete` set to the desired behavior
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class Accesscontrol(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    rfid_tag_id = models.CharField(db_column='RFID_TAG_ID', max_length=255)  # Field name made lowercase.
    allowed_entry = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'AccessControl'


class Coindata(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    price = models.FloatField(db_column='Price')  # Field name made lowercase.
    volume = models.FloatField(db_column='Volume')  # Field name made lowercase.
    market_cap = models.FloatField(db_column='Market_cap')  # Field name made lowercase.
    symbol = models.CharField(db_column='Symbol', max_length=10)  # Field name made lowercase.
    timestanp = models.DateTimeField()

    class Meta:
        managed = False
        db_table = 'CoinData'


class Crypto(models.Model):
    currency = models.CharField(db_column='Currency', max_length=255)  # Field name made lowercase.
    price = models.FloatField(db_column='Price')  # Field name made lowercase.
    timecaputured = models.DateTimeField(db_column='TimeCaputured')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'Crypto'


class Drinkqueue(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    drink = models.TextField(db_column='Drink')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'DrinkQueue'


class Drinksavailable(models.Model):
    available = models.IntegerField(db_column='Available')  # Field name made lowercase.
    drink = models.TextField(db_column='Drink')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'DrinksAvailable'


class Idtoname(models.Model):
    id = models.IntegerField(db_column='ID', primary_key=True)  # Field name made lowercase.
    name = models.TextField(db_column='Name')  # Field name made lowercase.
    model = models.TextField(db_column='Model')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'IdToName'


class Livingroom(models.Model):
    site_id = models.CharField(max_length=255, blank=True, null=True)
    assoc_time = models.CharField(max_length=255, blank=True, null=True)
    latest_assoc_time = models.CharField(max_length=255, blank=True, null=True)
    oui = models.CharField(max_length=255, blank=True, null=True)
    user_id = models.CharField(max_length=255, blank=True, null=True)
    field_id = models.CharField(db_column='_id', max_length=255, blank=True, null=True)  # Field renamed because it started with '_'.
    mac = models.CharField(max_length=255, blank=True, null=True)
    is_guest = models.CharField(max_length=255, blank=True, null=True)
    first_seen = models.CharField(max_length=255, blank=True, null=True)
    last_seen = models.CharField(max_length=255, blank=True, null=True)
    is_wired = models.CharField(max_length=255, blank=True, null=True)
    hostname = models.CharField(max_length=255, blank=True, null=True)
    field_uptime_by_uap = models.CharField(db_column='_uptime_by_uap', max_length=255, blank=True, null=True)  # Field renamed because it started with '_'.
    field_last_seen_by_uap = models.CharField(db_column='_last_seen_by_uap', max_length=255, blank=True, null=True)  # Field renamed because it started with '_'.
    field_is_guest_by_uap = models.CharField(db_column='_is_guest_by_uap', max_length=255, blank=True, null=True)  # Field renamed because it started with '_'.
    ap_mac = models.CharField(max_length=255, blank=True, null=True)
    channel = models.CharField(max_length=255, blank=True, null=True)
    radio = models.CharField(max_length=255, blank=True, null=True)
    radio_name = models.CharField(max_length=255, blank=True, null=True)
    essid = models.CharField(max_length=255, blank=True, null=True)
    bssid = models.CharField(max_length=255, blank=True, null=True)
    powersave_enabled = models.CharField(max_length=255, blank=True, null=True)
    is_11r = models.CharField(max_length=255, blank=True, null=True)
    ccq = models.CharField(max_length=255, blank=True, null=True)
    rssi = models.CharField(max_length=255, blank=True, null=True)
    noise = models.CharField(max_length=255, blank=True, null=True)
    signal = models.CharField(max_length=255, blank=True, null=True)
    tx_rate = models.CharField(max_length=255, blank=True, null=True)
    rx_rate = models.CharField(max_length=255, blank=True, null=True)
    tx_power = models.CharField(max_length=255, blank=True, null=True)
    idletime = models.CharField(max_length=255, blank=True, null=True)
    ip = models.CharField(max_length=255, blank=True, null=True)
    dhcpend_time = models.CharField(max_length=255, blank=True, null=True)
    satisfaction = models.CharField(max_length=255, blank=True, null=True)
    anomalies = models.CharField(max_length=255, blank=True, null=True)
    vlan = models.CharField(max_length=255, blank=True, null=True)
    radio_proto = models.CharField(max_length=255, blank=True, null=True)
    uptime = models.CharField(max_length=255, blank=True, null=True)
    tx_bytes = models.CharField(max_length=255, blank=True, null=True)
    rx_bytes = models.CharField(max_length=255, blank=True, null=True)
    tx_packets = models.CharField(max_length=255, blank=True, null=True)
    tx_retries = models.CharField(max_length=255, blank=True, null=True)
    wifi_tx_attempts = models.CharField(max_length=255, blank=True, null=True)
    rx_packets = models.CharField(max_length=255, blank=True, null=True)
    bytes_r = models.CharField(db_column='bytes-r', max_length=255, blank=True, null=True)  # Field renamed to remove unsuitable characters.
    tx_bytes_r = models.CharField(db_column='tx_bytes-r', max_length=255, blank=True, null=True)  # Field renamed to remove unsuitable characters.
    rx_bytes_r = models.CharField(db_column='rx_bytes-r', max_length=255, blank=True, null=True)  # Field renamed to remove unsuitable characters.
    authorized = models.CharField(max_length=255, blank=True, null=True)
    qos_policy_applied = models.CharField(max_length=255, blank=True, null=True)
    name = models.CharField(db_column='Name', max_length=255, blank=True, null=True)  # Field name made lowercase.
    wasinlivingroom = models.CharField(db_column='wasInLivingRoom', max_length=255, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'LivingRoom'


class Livingroomtraining(models.Model):
    sam_home = models.IntegerField(db_column='Sam_Home', blank=True, null=True)  # Field name made lowercase.
    sam_signal = models.IntegerField(db_column='Sam_Signal', blank=True, null=True)  # Field name made lowercase.
    sam_ap = models.IntegerField(db_column='Sam_AP', blank=True, null=True)  # Field name made lowercase.
    will_home = models.IntegerField(db_column='Will_Home', blank=True, null=True)  # Field name made lowercase.
    will_signal = models.IntegerField(db_column='Will_Signal', blank=True, null=True)  # Field name made lowercase.
    will_ap = models.IntegerField(db_column='Will_AP', blank=True, null=True)  # Field name made lowercase.
    breck_home = models.IntegerField(db_column='Breck_Home', blank=True, null=True)  # Field name made lowercase.
    breck_signal = models.IntegerField(db_column='Breck_Signal', blank=True, null=True)  # Field name made lowercase.
    breck_ap = models.IntegerField(db_column='Breck_AP', blank=True, null=True)  # Field name made lowercase.
    briggs_home = models.IntegerField(db_column='Briggs_Home', blank=True, null=True)  # Field name made lowercase.
    briggs_signal = models.IntegerField(db_column='Briggs_Signal', blank=True, null=True)  # Field name made lowercase.
    briggs_ap = models.IntegerField(db_column='Briggs_AP', blank=True, null=True)  # Field name made lowercase.
    derek_home = models.IntegerField(db_column='Derek_Home', blank=True, null=True)  # Field name made lowercase.
    derek_signal = models.IntegerField(db_column='Derek_Signal', blank=True, null=True)  # Field name made lowercase.
    derek_ap = models.IntegerField(db_column='Derek_AP', blank=True, null=True)  # Field name made lowercase.
    hour = models.IntegerField(db_column='Hour', blank=True, null=True)  # Field name made lowercase.
    numclients = models.IntegerField(db_column='NumClients', blank=True, null=True)  # Field name made lowercase.
    chromecast_tx_packets = models.IntegerField(db_column='Chromecast_tx_packets', blank=True, null=True)  # Field name made lowercase.
    chromecast_rx_packets = models.IntegerField(db_column='Chromecast_rx_packets', blank=True, null=True)  # Field name made lowercase.
    chromecast_tx_bytes_r = models.IntegerField(db_column='Chromecast_tx_bytes_r', blank=True, null=True)  # Field name made lowercase.
    chromecast_rx_bytes_r = models.IntegerField(db_column='Chromecast_rx_bytes_r', blank=True, null=True)  # Field name made lowercase.
    someonelivingroom = models.IntegerField(db_column='SomeoneLivingRoom', blank=True, null=True)  # Field name made lowercase.
    timestanp = models.DateTimeField()

    class Meta:
        managed = False
        db_table = 'LivingRoomTraining'


class Partylog(models.Model):
    hostname = models.TextField(blank=True, null=True)
    macaddress = models.TextField(db_column='MacAddress', blank=True, null=True)  # Field name made lowercase.
    last_seen = models.DateTimeField(blank=True, null=True)
    first_seen = models.DateTimeField(blank=True, null=True)
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'PartyLog'


class Peoplehere(models.Model):
    name = models.CharField(db_column='Name', max_length=30, blank=True, null=True)  # Field name made lowercase.
    hostname = models.CharField(max_length=255, blank=True, null=True)
    macaddress = models.CharField(db_column='MacAddress', max_length=100, blank=True, null=True)  # Field name made lowercase.
    timearrived = models.DateTimeField(db_column='TimeArrived')  # Field name made lowercase.
    resident = models.IntegerField(db_column='Resident')  # Field name made lowercase.
    last_updated = models.DateTimeField(db_column='Last_Updated')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'PeopleHere'


class Personactionlog(models.Model):
    person = models.CharField(db_column='Person', max_length=50)  # Field name made lowercase.
    action = models.CharField(db_column='Action', max_length=30)  # Field name made lowercase.
    timestamp = models.DateTimeField(db_column='Timestamp')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'PersonActionLog'


class Processtorun(models.Model):
    command = models.TextField(db_column='Command')  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    server = models.TextField(db_column='Server')  # Field name made lowercase.
    args = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ProcessToRun'


class Remote(models.Model):
    remotename = models.CharField(db_column='RemoteName', max_length=30)  # Field name made lowercase.
    protocol = models.CharField(db_column='Protocol', max_length=10, blank=True, null=True)  # Field name made lowercase.
    code = models.TextField(db_column='Code')  # Field name made lowercase.
    buttonname = models.CharField(db_column='ButtonName', max_length=30)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'Remote'


class Remotesettings(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    active = models.IntegerField(db_column='Active')  # Field name made lowercase.
    room = models.CharField(db_column='Room', max_length=50)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'RemoteSettings'


class Securityinfo(models.Model):
    id = models.IntegerField(db_column='ID')  # Field name made lowercase.
    timeseen = models.DateTimeField(db_column='TimeSeen', blank=True, null=True)  # Field name made lowercase.
    model = models.TextField(db_column='Model')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'SecurityInfo'


class Sensordata(models.Model):
    sensorname = models.CharField(db_column='SensorName', max_length=50)  # Field name made lowercase.
    sensorreading = models.CharField(db_column='SensorReading', max_length=25)  # Field name made lowercase.
    sensortype = models.CharField(db_column='SensorType', max_length=50)  # Field name made lowercase.
    timestamp = models.DateTimeField(db_column='Timestamp')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'SensorData'


class Sensorinfo(models.Model):
    sensorname = models.CharField(db_column='SensorName', max_length=50)  # Field name made lowercase.
    location = models.CharField(db_column='Location', max_length=50)  # Field name made lowercase.
    displayname = models.CharField(db_column='displayName', max_length=50)  # Field name made lowercase.
    sensortype = models.CharField(db_column='SensorType', max_length=50)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'SensorInfo'


class Serversandservices(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    ip = models.CharField(max_length=50)
    service = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'ServersAndServices'


class Servicestatus(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    status = models.CharField(db_column='Status', max_length=50)  # Field name made lowercase.
    timestamp = models.DateTimeField(db_column='Timestamp')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ServiceStatus'


class Soundqueue(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    tts = models.TextField(db_column='TTS', blank=True, null=True)  # Field name made lowercase.
    speaker = models.CharField(db_column='Speaker', max_length=50)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'SoundQueue'


class Wifiinfo(models.Model):
    hostname = models.TextField()
    macaddress = models.TextField(db_column='MacAddress')  # Field name made lowercase.
    last_seen = models.DateTimeField(blank=True, null=True)
    relevant = models.IntegerField(db_column='Relevant')  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'WifiInfo'


class Alarm(models.Model):
    alarmtime = models.DateTimeField(db_column='alarmTime', blank=True, null=True)  # Field name made lowercase.
    room = models.CharField(db_column='Room', max_length=50)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'alarm'


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


class Homework(models.Model):
    assignment = models.TextField(db_column='Assignment', blank=True, null=True)  # Field name made lowercase.
    due_date = models.DateField(blank=True, null=True)
    class_field = models.TextField(db_column='class')  # Field renamed because it was a Python reserved word.
    notes = models.TextField()
    uid = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'homework'


class Knownpeople(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    hostname = models.CharField(max_length=50, blank=True, null=True)
    macadd = models.CharField(db_column='macAdd', max_length=50, blank=True, null=True)  # Field name made lowercase.
    resident = models.IntegerField(db_column='Resident')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'knownpeople'


class Mactoname(models.Model):
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    macaddress = models.TextField(db_column='MacAddress')  # Field name made lowercase.
    name = models.TextField(db_column='Name')  # Field name made lowercase.
    isset = models.IntegerField(db_column='isSet')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'macToName'


class Mariokart(models.Model):
    track = models.TextField(db_column='Track')  # Field name made lowercase.
    cup = models.TextField(db_column='Cup')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'mariokart'


class Peopletonotice(models.Model):
    name = models.CharField(db_column='Name', max_length=50)  # Field name made lowercase.
    email = models.CharField(max_length=50, blank=True, null=True)
    textnum = models.CharField(db_column='textNum', max_length=50, blank=True, null=True)  # Field name made lowercase.
    callnum = models.CharField(db_column='callNum', max_length=50, blank=True, null=True)  # Field name made lowercase.
    active = models.IntegerField()
    specialaction = models.CharField(db_column='specialAction', max_length=50, blank=True, null=True)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.
    prioritylevel = models.CharField(db_column='PriorityLevel', max_length=50)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'peopleToNotice'


class Persondetectionpriority(models.Model):
    prioritylevel = models.CharField(db_column='PriorityLevel', max_length=50)  # Field name made lowercase.
    id = models.AutoField(db_column='ID', primary_key=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'personDetectionPriority'


class Personstatus(models.Model):
    person = models.CharField(db_column='Person', max_length=30)  # Field name made lowercase.
    status = models.CharField(db_column='Status', max_length=50)  # Field name made lowercase.
    timestamp = models.DateTimeField(db_column='Timestamp')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'personStatus'


class Userinfo(models.Model):
    userid = models.AutoField(primary_key=True)
    usertype = models.CharField(db_column='UserType', max_length=50)  # Field name made lowercase.
    email = models.TextField()
    pwd = models.TextField()
    timecreated = models.DateTimeField(db_column='TimeCreated')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'userinfo'
