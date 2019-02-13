@component('mail::message')
# Hello

{{ $body }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Regards!, <br>
{{ config('app.name') }}
@endcomponent