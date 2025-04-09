from django.shortcuts import render, redirect
from profiles.forms import Users_perfil_form
from profiles.models import Users_perfil
from django.contrib.auth.decorators import login_required

@login_required
def editar_perfil(request):
    try:
        profile = Users_perfil.objects.get(user=request.user)
    except Users_perfil.DoesNotExist:
        profile = None

    if request.method == 'POST':
        form = Users_perfil_form(request.POST, request.FILES, instance=profile)
        if form.is_valid():
            new_profile = form.save(commit=False)
            new_profile.user = request.user
            new_profile.save()
            return redirect('ver_perfil')
    else:
        if profile is None:
            form = Users_perfil_form()
        else:
            form = Users_perfil_form(instance=profile)

    return render(request, 'editar_perfil.html', {'form': form})

@login_required
def ver_perfil(request):
    try:
        profile = Users_perfil.objects.get(user=request.user)
    except Users_perfil.DoesNotExist:
        profile = None 

    return render(request, 'ver_perfil.html', {'profile': profile})



