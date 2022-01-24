from rest_framework.viewsets import ViewSet
from rest_framework.response import Response
from rest_framework.status import HTTP_200_OK, HTTP_500_INTERNAL_SERVER_ERROR, HTTP_501_NOT_IMPLEMENTED, HTTP_404_NOT_FOUND
from frontend.models import Processtorun

class Command(ViewSet):
    
    def list(self,request):
        return Response(status=HTTP_501_NOT_IMPLEMENTED)
    
    def post(self, request):
        device_name = self.request.query_params.get('device_name')
        command = self.request.query_params.get('command')
        args = self.request.query_params.get('args')

        print(self.request.headers)

        print(self.request.query_params)
        if device_name is None or command is None:
            return Response(HTTP_500_INTERNAL_SERVER_ERROR)

        new_process = Processtorun(server=device_name, command=command,args=args)
        new_process.save()
    
        return Response({}, HTTP_200_OK)

    def put(self, request):
        try:
            data = self.request.data
        except Exception as e:
            return Response({}, HTTP_404_NOT_FOUND)
        
        command = data['command']
        device_name = data['device_name']

        try:
            args = data['args']
        except Exception as e:
            args = None

        new_process = Processtorun(server=device_name, command=command,args=args)
        new_process.save()

        return Response({}, HTTP_200_OK)