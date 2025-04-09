"""
URL configuration for speedrs project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/5.1/topics/http/urls/
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
from django.contrib import admin
from django.urls import path , include
from users import views as users_views
from profiles import views as profiles_views
from two_factor.views import LoginView, ProfileView

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', users_views.signin, name='2faapp'),
    path('signup/', users_views.signup, name='signup'),
    path('landing/', users_views.landing, name='landing'),
    path('logout/', users_views.signout, name='logout'),
    path('profile/editar_perfil/', profiles_views.editar_perfil, name='editar_perfil'),
    path('profile/ver_perfil/', profiles_views.ver_perfil, name='ver_perfil'),
    # Elimina la duplicación y usa un solo prefijo
    path('2faapp/account/two_factor/', include('two_factor.urls', namespace='two_factor')),

]