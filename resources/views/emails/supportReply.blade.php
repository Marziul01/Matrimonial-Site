@component('mail::message')
# Hello {{ $request->name }},

{{ $request->reply }}

Thank you for reaching out to us. If you have anu further questions please send email to info@linkmyheart.com


Thanks,<br>
{{ config('app.name') }}
@endcomponent
