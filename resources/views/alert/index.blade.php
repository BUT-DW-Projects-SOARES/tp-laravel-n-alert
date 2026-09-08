<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alerts</title>
</head>

<body>
    <h1>Liste des alertes</h1>
    <p><a href="{{ route('home.index') }}">Voir l'accueil</a></p>
    <ul>
        @foreach ($alerts as $alert)
        <li><a href="{{ route('alert.show', $alert) }}">{{ $alert->title }}</a></li>
        @endforeach
    </ul>
</body>

</html>