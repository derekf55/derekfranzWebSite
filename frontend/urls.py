from os import name
from django.urls import path
import frontend.views 

urlpatterns = [

    path('main-ui/', frontend.views.main_ui, name='main-ui'),
    path('derek-ui/', frontend.views.derek_ui, name='derek-ui'),
    path('file-upload/', frontend.views.file_upload, name='file-upload'),
    path('mariokart/', frontend.views.mario_kart, name='mariokart'),
    path('light-click/', frontend.views.light_view, name='light-click/'),
    path('led/',frontend.views.led, name='led'),
    path('command-choice/',frontend.views.command_choice, name='command-choice'),
    path('tvremote/', frontend.views.tv_remote, name='tvremote'),
    path('donny/', frontend.views.donny, name='donny'),
    path('room-lights/', frontend.views.room_lights, name='room-lights/'),
    path('homemanagement/', frontend.views.home_management, name='homemanagement'),
    path('text-to-speech', frontend.views.text_to_speech,name='text-to-speech')

]