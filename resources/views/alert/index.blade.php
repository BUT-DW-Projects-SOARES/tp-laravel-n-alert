<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alerts</title>
</head>

<body>
    <ul>
        @foreach ($alerts as $alert)
        <li><a href="{{ route('alert.show', $alert) }}">{{ $alert->title }}</a></li>
        @endforeach
    </ul>
</body>

</html>