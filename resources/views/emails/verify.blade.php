<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hesab doğrulaması | JobNest</title>
</head>
<body>
<p>
    Hər vaxtınız xeyir <b>{{ $user->name . " ". $user->surname ?? "" }}</b>. Hesabınızı doğrulamaq üçün aşağıdakı keçidə basın.
</p>
<p>
    <a href="{{ route("user-verify", ["token" => $token]) }}">Doğrula</a>

<hr>

</p>
</body>
</html>
