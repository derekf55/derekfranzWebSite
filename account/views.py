from django.shortcuts import render, redirect
from account.forms import LogInForm, CreateUserForm
from django.contrib.auth import login, authenticate, logout, update_session_auth_hash
from django.contrib import messages
from django.http import HttpResponseRedirect
# Create your views here.

def log_in(request):
    if request.user.is_authenticated:
        if request.user.username == 'derek':
            return redirect('/derek-ui')
        else:
            return redirect('/main-ui')
        
        
    if request.method == 'POST':
        form = LogInForm(request.POST)
        if form.is_valid():
            username = form.cleaned_data['username']
            password = form.cleaned_data['password']
            user = authenticate(username=username,password=password)
            if user:
                login(request,user)
                if request.user.username == 'derek':
                    return redirect('/derek-ui')
                else:
                    return redirect('/main-ui')
            else:
                messages.info(request, 'Username or password incorrect')
    else:
        form = LogInForm()
    return render(request, 'login.html', {'form':form})

def signup(request):
    if request.method == 'POST':
        form = CreateUserForm(request.POST)
        if form.is_valid():
            user = form.save()
            login(request, user)
            return HttpResponseRedirect('/main-ui')
    else:
        form = CreateUserForm()

    
    return render(request, 'signup.html',{'form':form})

def log_out(request):
    logout(request)
    return redirect("/")