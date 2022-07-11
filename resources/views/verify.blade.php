<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>授权页</title>
</head>
<body>
<form method="POST" action="{{ route('verify') }}">
    @csrf

    <div>
        <button type="submit">
           授权登录
        </button>
    </div>
</form>
</body>
</html>
