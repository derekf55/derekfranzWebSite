import imp
from django.shortcuts import redirect, render
from requests.api import request
from urllib3 import Retry
import dereksite.home_assistant
import csv
import os
import random
import time
from frontend.models import Processtorun, Homeautomation, Peoplehere, Persondetectionpriority
from django.contrib.auth.decorators import login_required, permission_required, user_passes_test
from requests import post
from django.template import RequestContext
import derek_functions as df
from frontend.forms import FileUploadForm
from frontend.models import FileUpload
from dereksite import settings


def is_derek(user):
    if user.username == 'Derek' or user.email == 'derekfran55@gmail.com':
        return True
    return False

def light_view(request):
    light = request.POST['light']
    dereksite.home_assistant.switch_light(light)
    
    time.sleep(.1)
    light_data = dereksite.home_assistant.get_light_dict(light)
    room = light_data['room']
    if request.user.username == 'derek':
            return redirect(f'/room-lights/?room={room}')
    else:
        return redirect('/main-ui')

    
    return redirect(request.META.get('HTTP_REFERER', '/'))


def main_ui(request):
    try:
        lights = dereksite.home_assistant.get_lights_in_room('livingroom')
    except Exception as e:
        lights = []
    #print(lights)
    return render(request, 'main_ui.html',{'lights':lights})

@login_required
@user_passes_test(is_derek)
def derek_ui(request):
    return render(request, 'derek-ui.html')

@login_required
def mario_kart(request):
    path = os.path.join(settings.BASE_DIR,'frontend','data','mariokart.csv')
    tracks = []
    with open(path) as csvfile:
        reader = csv.reader(csvfile,delimiter=',')
        for track, cup in reader:
            d = {}
            d['track'] = track
            d['cup'] = cup
            tracks.append(d)

    track = tracks[random.randint(0,len(tracks)-1)]
    file_name = 'images/mario/'+track['cup'].split(' ')[0]+'.png'
    print(file_name)
    track['file_path'] = file_name

    return render(request, 'mariokart.html', {'track':track})

@login_required
def led(request):
    return render(request,'led.html')


def command_choice(request):
    command = request.POST['command']
    server = 'Pi'

    if command == 'VolumeDown5':
        command = 'VolumeDown'
        for i in range(0,4):
            p = Processtorun(command=command, server=server)
            p.save()
    elif command == 'VolumeUp5':
        command = 'VolumeUp'
        for i in range(0,4):
            p = Processtorun(command=command, server=server)
            p.save()
    elif command == 'LEDpower':
        led = Homeautomation.objects.get(appliance='LED')
        if led.state == 0:
            led.state = 1
        else:
            led.state = 0
        led.save()

    p = Processtorun(command=command, server=server)
    p.save()

    return redirect(request.META.get('HTTP_REFERER', '/'))

@login_required
def tv_remote(request):
    return render(request,'tvremote.html')

@login_required
def donny(request):
    sound_files = os.listdir('static/audio/DONNY_MP3_FILES')
    choosen_file = sound_files[random.randint(0, len(sound_files) - 1)]

    url = "https://derekfranz.ddns.net:8542/api/services/media_player/play_media"

    data = {"media_content_id":f"http://derekfranz.ddns.net/DONNY_MP3_FILES/{choosen_file}",
        "media_content_type": "audio/mp3", "entity_id": "media_player.living_room_speaker"
    }
    try:
        response = post(url, headers=df.HOME_ASSISTANT_HEADERS, json=data ,verify=False)
    except Exception as e:
        pass

    return redirect(request.META.get('HTTP_REFERER', '/'))

@login_required
def room_lights(request):
    room = request.GET['room']
    print(room)  
    try:
        lights = dereksite.home_assistant.get_lights_in_room(room)
    except Exception as e:
        ligts = []

    print(lights)
    return render(request, 'room-light.html',{'lights':lights})


def home_management(request):
    if request.method == "POST":
        desired_priority = request.POST['priority']
        priority_object = Persondetectionpriority.objects.get(id=1)
        priority_object.prioritylevel = desired_priority
        priority_object.save()

    people_here = Peoplehere.objects.all().order_by('resident','name')
    current_priority = Persondetectionpriority.objects.get(id=1)
    prioities = Persondetectionpriority.objects.all().exclude(id=1)

    return render(request, 'homemanagement.html',{'people_here':people_here, 
        'priorities': prioities, 'current_priority': current_priority})

@login_required
def text_to_speech(request):
    if request.method == "POST":
        speaker = request.POST['Speaker']
        text = request.POST['tts']
        print(f'{speaker}:{text}')

        url = "https://derekfranz.ddns.net:8542/api/services/tts/google_say"

        if speaker == "Derek's Room":
            speaker = "media_player.dereks_room_speaker"
        elif speaker == "Living Room ":
            speaker = "media_player.living_room_speaker"
        elif speaker == "Sam's Room":
            speaker = "media_player.sams_room_speaker"

        data = {"entity_id": speaker, 'message': text, 'cache': 'true'}
        try:
            response = post(url, headers=df.HOME_ASSISTANT_HEADERS, verify=False, json=data)
        except Exception as e:
            pass

    return render(request, 'text-to-speech.html')

@login_required
def file_upload(request):
    if request.method == "POST":
        form = FileUploadForm(request.POST, request.FILES)
        if form.is_valid():
            new_file = FileUpload(file_field=request.FILES['f'])
            new_file.save()

    else:
        form = FileUploadForm()

    form = FileUploadForm()

    return render(request, 'fileupload.html', {'form':form})