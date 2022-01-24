from django.shortcuts import render
from rest_framework.viewsets import ViewSet
from rest_framework.response import Response
from rest_framework.status import HTTP_200_OK, HTTP_500_INTERNAL_SERVER_ERROR, HTTP_501_NOT_IMPLEMENTED, HTTP_404_NOT_FOUND
import derek_functions as df
from requests import get, post
from dereksite import home_assistant
from rest_framework.renderers import StaticHTMLRenderer

# Create your views here.

class Light(ViewSet):
    """This endpoint will allow for toggling a light on or off"""

    def list(self, request):
        
        return Response(status=HTTP_501_NOT_IMPLEMENTED)

    def post(self, request):

        light_name = self.request.query_params.get('light')
        desired_state = self.request.query_params.get('state')
        room = self.request.query_params.get('room')
        if light_name is None and room is None:
            return Response(status=HTTP_404_NOT_FOUND)

        
        if room is not None:
            try:
                lights = home_assistant.get_lights_in_room(room)
            except Exception as e:
                return Response(status=HTTP_500_INTERNAL_SERVER_ERROR)


            for light in lights:
                if desired_state is not None and desired_state == 'on':
                    url = "https://derekfranz.ddns.net:8542/api/services/light/turn_on"
                elif desired_state is not None and desired_state == 'off':
                    url = "https://derekfranz.ddns.net:8542/api/services/light/turn_off"
                else:
                    current_state = light['state']
                    if current_state == 'on':
                        requseted_state = 'off'
                    else:
                        requseted_state = 'on'
                    url = f"https://derekfranz.ddns.net:8542/api/services/light/turn_{requseted_state}"

                service_data = {"entity_id":light['entity_id'] }
                try:
                    post(url,headers=df.HOME_ASSISTANT_HEADERS,json=service_data,verify=False)
                except Exception as e:
                    return Response(status=HTTP_500_INTERNAL_SERVER_ERROR)

            return Response(status=HTTP_200_OK)


        if desired_state is not None and desired_state == 'on':
            url = "https://derekfranz.ddns.net:8542/api/services/light/turn_on"
        elif desired_state is not None and desired_state == 'off':
            url = "https://derekfranz.ddns.net:8542/api/services/light/turn_off"
        else:
            current_state = home_assistant.get_state(f'light.{light_name}')
            if current_state == 'on':
                desired_state = 'off'
            else:
                desired_state = 'on'
            url = f"https://derekfranz.ddns.net:8542/api/services/light/turn_{desired_state}"
            
        if 'light.' not in light_name:
            light_name = f'light.{light_name}'
        service_data = {"entity_id":f'{light_name}' }
        try:
            response = post(url,headers=df.HOME_ASSISTANT_HEADERS,json=service_data,verify=False)
        except Exception as e:
            return Response(status=HTTP_500_INTERNAL_SERVER_ERROR)

        return Response(status=HTTP_200_OK)
