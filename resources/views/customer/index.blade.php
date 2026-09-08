<x-layout.base title="All customers">
    <h1>Liste des clients</h1>
    <p><a href="{{ route('home.index') }}">Voir l'accueil</a></p>
    <ul>
        @foreach ($customers as $customer)
            <li><a href="{{ route('customer.show', ['customer' => $customer]) }}">{{ $customer->label }}</a></li>
        @endforeach
    </ul>
</x-layout.base>