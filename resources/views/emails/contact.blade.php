<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    <p>
        You have received a new message from your website contact form.
    </p>
    <p>
        <strong>{{ $subject }}</strong>
    </p>
    <ul>
        <li>Name: <strong>{{ $name }}</strong></li>
        <li>Surname: <strong>{{ $surname }}</strong></li>
        <li>Email: <strong>{{ $email }}</strong></li>
        <strong>{{ $subject }}</strong>
    </ul>
    <hr>
    <p>
        @foreach ($messageLines as $messageLine)
            {{ $messageLine }}<br>
        @endforeach
    </p>
</body>
</html>