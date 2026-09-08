<x-layout.base title="All alerts">
    <h1>Liste des alertes</h1>
    <p><a href="{{ route('home.index') }}">Voir l'accueil</a></p>
    <ul>
        @foreach ($alerts as $alert)
        <li><a href="{{ route('alert.show', $alert) }}">{{ $alert->title }}</a> ({{ $alert->category?->label }})</li>
        @endforeach
    </ul>
</x-layout.base>