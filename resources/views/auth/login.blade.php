<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <input type="email" name="email" id="">
        </div>
        <div>
            <input type="password" name="password" id="">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>