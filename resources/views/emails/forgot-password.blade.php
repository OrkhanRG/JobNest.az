<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Şifrə Sıfırlama | JobNest</title>
</head>
<body>
<p>
    Hər vaxtınız xeyir <b>{{ $user->name . " ". $user->surname ?? "" }}</b>. Şifrənizi sıfırlamaq üçün aşağıdakı linkə keçid edin.
</p>
<p>
    <a href="{{ route("password-reset-form", ["token" => $token]) }}">Sıfırla</a>
    <hr>
</p>
</body>
</html>
