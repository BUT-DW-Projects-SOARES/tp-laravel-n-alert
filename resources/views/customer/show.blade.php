<x-layout.base title="Customer {{ $customer->label }}">
    <h1>Client n° {{ $customer->id }}</h1>
    <p><a href="{{ route('customer.index') }}">Retour à la liste des clients</a></p>
    <h1>{{ $customer->label }}</h1>
    <p>{{ $customer->email }}</p>
    <p>{{ $customer->firstname }} {{ $customer->lastname }}</p>
</x-layout.base>