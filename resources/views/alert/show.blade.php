<x-layout.base title="Alert {{ $alert->title }}">
    <h1>Alerte n° {{ $alert->id }}</h1>
    <p><a href="{{ route('home.index') }}">Voir l'accueil</a></p>
    <p><a href="{{ route('alert.index') }}">Voir les alertes</a></p>
    <h1>{{ $alert->title }}</h1>
    <p>{{ $alert->published_at->isoFormat('L HH:mm') }}</p>
    <p>{{ $alert->description }}</p>
</x-layout.base>