<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Dear {{ $data['name'] }},<br><br>

    Greetings from ISFO Team!!!<br>

    Thank you for registering for ISFO. Your login credentials are as follows -<br>
    URL - https://skool.ai/isfo/login <br>
    Username - {{ $data['email'] }}<br>
    Password - {{ $data['password'] }}<br>

    Best Regards,<br><br>

    Team ISFO
</body>
</html>