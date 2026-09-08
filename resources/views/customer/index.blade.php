<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
</head>

<body>
    <h1>Liste des clients</h1>
    <p><a href="{{ route('home.index') }}">Voir l'accueil</a></p>
    <ul>
        @foreach ($customers as $customer)
            <li><a href="{{ route('customer.show', ['customer' => $customer]) }}">{{ $customer->label }}</a></li>
        @endforeach
    </ul>
</body>

</html>