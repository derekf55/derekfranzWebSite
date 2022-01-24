from rest_framework.viewsets import ViewSet
from rest_framework.response import Response
from rest_framework.status import HTTP_200_OK, HTTP_500_INTERNAL_SERVER_ERROR, HTTP_501_NOT_IMPLEMENTED, HTTP_404_NOT_FOUND
from frontend.models import Processtorun, Homeautomation

class Switch(ViewSet):
    
    def list(self,request):
        try:
            appliance = self.request.headers['Appliance']
        except Exception as e:
            return Response(status=HTTP_404_NOT_FOUND)
        
        device_status = Homeautomation.objects.get(appliance=appliance)
        if device_status.state == 1:
            status = 'true'
        else:
            status = 'false'
        
        return Response({'ison':status}, status=HTTP_200_OK)
    
    def post(self, request):
        appliance = request.headers['Appliance']
        if appliance == 'LED':
            command, device = 'LEDpower', 'Pi'
        elif appliance == 'Derek_AC':
            command, device = 'Derek_AC_Power', 'Pi2'
        
        device_status = Homeautomation.objects.get(appliance=appliance)
        if device_status.state == 1:
            device_status.state = 0
            status = 'true'
        else:
            device_status.state = 1
            status = 'false'

        device_status.save()

        new_process = Processtorun(command=command, server=device)
        new_process.save()

        return Response({'ison':status}, status=HTTP_200_OK)
