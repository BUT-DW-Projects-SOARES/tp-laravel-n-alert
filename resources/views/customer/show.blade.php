<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $customer->label }}</title>
</head>

<body>
    <p><a href="{{ route('customer.index') }}">back to list</a></p>
    <h1>{{ $customer->label }}</h1>
    <p>{{ $customer->email }}</p>
    <p>{{ $customer->firstname }} {{ $customer->lastname }}</p>
</body>

</html>
