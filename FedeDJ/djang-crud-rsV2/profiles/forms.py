from django import forms
from .models import Users_perfil

class Users_perfil_form(forms.ModelForm):
    class Meta:
        model = Users_perfil
        fields = ['bio', 'fto', 'enlace', 'preferencias']

    preferences = forms.JSONField(widget=forms.Textarea, required=False)  
