from django.urls import path
import account.views

urlpatterns = [

    path('login/', account.views.log_in, name='login'),
    path('signup/', account.views.signup, name='signup'),
    path('logout/', account.views.log_out, name="logout"),
]