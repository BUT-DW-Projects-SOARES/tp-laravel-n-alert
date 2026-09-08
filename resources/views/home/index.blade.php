<x-layout.base title="Page d'accueil">
    <h1>Page d'accueil</h1>
    <p><a href="{{ route('alert.index') }}">Voir les alertes</a></p>
    <p><a href="{{ route('customer.index') }}">Voir les clients</a></p>
</x-layout.base>