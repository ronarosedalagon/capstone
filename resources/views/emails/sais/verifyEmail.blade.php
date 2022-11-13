<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to Our Website, {{ $user->last_name }} </h2>
    <p>
        Click <a href="{{ url('/register-user/verify/'.$user->token) }}">here</a> to 
        verify your email.
    </p>
</body>
</html>