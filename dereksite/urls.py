"""dereksite URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django import urls
from django.contrib import admin
from django.urls import path, include
from account.views import login
import account.urls
import frontend.urls
from django.conf import settings
from django.conf.urls.static import static
from rest_framework.routers import DefaultRouter
from api.light_views import Light
from api.command_view import Command
from api.switch_view import Switch
from account.views import log_in

router = DefaultRouter()
router.register(r"light", Light, basename='light')
router.register(r"commands", Command, basename='commands')
router.register(r"switch", Switch, basename='switch')

urlpatterns = [
    path('admin/', admin.site.urls),
    path('',log_in),
    path('', include(account.urls)),
    path('',include(frontend.urls)),
    path('',include(router.urls))
]
