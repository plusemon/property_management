@component('mail::message')

<h2>Hello Admin,</h2>
You received an email from : {{ $data->name }}<br/><br/>
Here are the details:<br/>
<b>Name:</b> {{ $data->name }}<br/>
<b>Email:</b> {{ $data->email }}<br/>
<b>Subject:</b> {{ $data->subject }}<br/>
<b>Message:</b> {{ $data->message }}<br/><br/>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
