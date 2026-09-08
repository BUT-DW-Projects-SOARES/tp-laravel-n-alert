<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>
</head>

<body>
    <h1>Page d'accueil</h1>
    <p><a href="{{ route('alert.index') }}">Voir les alertes</a></p>
    <p><a href="{{ route('customer.index') }}">Voir les clients</a></p>
</body>

</html>