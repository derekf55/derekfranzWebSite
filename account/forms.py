from typing import Text
from django import forms
from django.contrib.auth.forms import UserCreationForm
from django.forms import widgets
from django.forms.widgets import TextInput
from account.models import User

class CreateUserForm(UserCreationForm):
    base_widget_dict = {'class': 'form-control', 'placeholder':'Username'}
    username = forms.CharField(widget=TextInput(attrs=base_widget_dict),label='')
    
    base_widget_dict['placeholder'] = 'Email'
    base_widget_dict['type'] = 'email'
    email = forms.CharField(widget=TextInput(attrs=base_widget_dict),label='')

    base_widget_dict['placeholder'] = 'Password'
    base_widget_dict['type'] = 'password'
    password1 = forms.CharField(widget=TextInput(attrs=base_widget_dict),label='')

    base_widget_dict['placeholder'] = 'Re-enter Password'
    password2 = forms.CharField(widget=TextInput(attrs=base_widget_dict),label='')

    class Meta(UserCreationForm):
        model = User
        fields = ('username', 'email')
        


class LogInForm(forms.Form):
    
    username = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder':'Username'}), label='')
    password = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder':'Password', 'type':'password'}), label='')

    

    