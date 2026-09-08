<x-layout.base title="Customer {{ $customer->label }}">
    <h1>Client n° {{ $customer->id }}</h1>
    <p><a href="{{ route('customer.index') }}">Retour à la liste des clients</a></p>
    <h1>{{ $customer->label }}</h1>
    <ul>
        @foreach ($customer->contacts as $contact)
            <li>{{ $contact->firstname }} {{ $contact->lastname }} ({{ $contact->email }})</li>
        @endforeach
    </ul>
</x-layout.base>