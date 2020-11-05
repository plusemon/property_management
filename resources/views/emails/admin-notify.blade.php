@component('mail::message')
# New User Registration

A User Registred On this system
Please Approve him or stay inactive.

@component('mail::button', ['url' => url('/login')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
