@component('mail::message')
# Congratulations

You are approved by Admin. Now you can login with your information.

@component('mail::button', ['url' => url('/login')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
