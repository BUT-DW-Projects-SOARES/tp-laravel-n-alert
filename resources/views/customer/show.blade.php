<x-layout.base title="Customer {{ $customer->label }}">
    <p><a href="{{ route('customer.index') }}">back to list</a></p>
    <h1>{{ $customer->label }}</h1>
    <p>{{ $customer->email }}</p>
    <p>{{ $customer->firstname }} {{ $customer->lastname }}</p>
</x-layout.base>
