@component('mail::message')
# Welcome

{{$username}}

Hello there, glad you joined instalara.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
