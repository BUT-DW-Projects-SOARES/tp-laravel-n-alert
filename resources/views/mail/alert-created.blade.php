<x-mail::message>
# New alert

A new alert has been published:

{{ $alert->title }}

<x-mail::button :url="route('alert.show', ['alert' => $alert])">
View details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
