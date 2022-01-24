import datetime, json
import derek_functions as df
from requests import get, post

def get_light_dict(entity_id) -> dict:
    url = f"https://derekfranz.ddns.net:8542/api/states/{entity_id}"
    response = get(url=url,headers=df.HOME_ASSISTANT_HEADERS,verify=False)
    json_data = json.loads(response.text)
    domain, entity = entity_id.split('.')
    name, entitiy_room = entity.split('_')

    light_data = {}
    light_data['state'] = json_data['state']
    light_data['friendly_name'] = json_data['attributes']['friendly_name']
    light_data['entity_id'] = json_data['entity_id']
    light_data['room'] = entitiy_room
    return light_data

#@param room: Name of the room for lights 
#@return: Returns a list of light dicts that are in the room
def get_lights_in_room(room) -> list:
    url = f"https://derekfranz.ddns.net:8542/api/states"
    response = get(url=url,headers=df.HOME_ASSISTANT_HEADERS,verify=False)
    json_data = json.loads(response.text)
    entities = []
    
    for each in json_data:
        light_data = {}
        entity_id = each['entity_id']
        domain, entity = entity_id.split('.') 
        if domain == 'light':
            name, entitiy_room = entity.split('_')
            if entitiy_room == room or room == 'all':
                light_data['state'] = each['state']
                light_data['friendly_name'] = each['attributes']['friendly_name']
                light_data['entity_id'] = each['entity_id']
                entities.append(light_data)

    return entities

def get_state(entity_id):
    url = f"https://derekfranz.ddns.net:8542/api/states/{entity_id}"
    response = get(url,headers=df.HOME_ASSISTANT_HEADERS, verify=False)
    json_data = json.loads(response.text)
    state = json_data['state']
    return state

def switch_light(entity_id):
    current_state = get_state(entity_id)
    if current_state == 'on':
        desired_state = 'off'
    else:
        desired_state = 'on'
    set_state(entity_id,desired_state)

def set_state(entity_id, state):
    url = f"https://derekfranz.ddns.net:8542/api/services/light/turn_{state}"
    service_data = {"entity_id":entity_id }
    post(url,headers=df.HOME_ASSISTANT_HEADERS,json=service_data,verify=False)
    