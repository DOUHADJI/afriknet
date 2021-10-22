@component('mail::message')
# Valider votre compte

Bienvenue {{ $user->name }}

Cliquer sur le bouton ci-dessous pour valider votre compte Global .net !

@component('mail::button', ['url' => route ("confirmation_notice", [$user , $user->token])])
Valider mon compte
@endcomponent

Thanks,<br>
Global <sup>.net</sup>

@endcomponent
