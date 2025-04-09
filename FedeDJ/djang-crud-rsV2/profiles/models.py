from django.db import models

from django.db import models
from django.contrib.auth.models import User

class Users_perfil(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    bio = models.TextField(blank=True, null=True)
    fto = models.ImageField(upload_to='./static/stylesp.css', blank=True, null=True)
    enlace = models.URLField(blank=True, null=True)
    preferencias = models.JSONField(default=dict, blank=True, null=True) 

    def __str__(self):
        return f'{self.user.username} Profile'
