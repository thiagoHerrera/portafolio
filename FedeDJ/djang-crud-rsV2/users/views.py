from django.shortcuts import render, redirect
#from django.http import HttpResponse
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.db import IntegrityError
from users.forms import RegisterForm

def home(request):
    return render(request, 'home.html')

def signup(request):
    if request.method == 'POST':
        print(request.POST.get('password1'))
        print(request.POST.get('password2'))

        form = RegisterForm(request.POST)
        if form.is_valid():
            try:
                user = form.save()  
                login(request, user)
                return redirect('two_factor:setup')  
            except IntegrityError:
                return render(request, 'signup.html', {
                    'form': form,
                    'error': 'El usuario ya existe'
                })
        else:
            return render(request, 'signup.html', {
                'form': form,
                'error': 'Las contraseñas no coinciden o datos inválidos'
            })
    else:
        form = RegisterForm()
        return render(request, 'signup.html', {'form': form})

def landing(request):
    return render(request, 'landing.html')

def signout(request):
    logout(request) # Cerrar sesión
    return redirect('home')

def signin(request):
    return redirect('two_factor:login')
        
