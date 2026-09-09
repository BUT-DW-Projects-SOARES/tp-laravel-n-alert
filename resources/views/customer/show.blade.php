<x-layout.base title="Customer {{ $customer->label }}">
    <h1>Client n° {{ $customer->id }}</h1>
    <p><a href="{{ route('customer.index') }}">Retour à la liste des clients</a></p>
    <p><a href="{{ route('customer.edit', ['customer' => $customer->id]) }}">Edit</a></p>
    <h1>{{ $customer->label }}</h1>
    <ul>
        @foreach ($customer->contacts as $contact)
        <li>{{ $contact->firstname }} {{ $contact->lastname }} ({{ $contact->email }}) {{ $contact->phone }}</li>
        @endforeach
    </ul>
    <p><a href="{{ route('contact.create', ['customer' => $customer]) }}">+ new contact</a></p>
</x-layout.base>