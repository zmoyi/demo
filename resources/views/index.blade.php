<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>扫码登录页</title>
</head>
<body>
@if (Route::has('login'))
    <div >
        @auth
            <a href="{{ url('/dashboard') }}" >Home</a>

        @else
            <a href="{{ route('login') }}" >Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
            <div class="page-center">
                <p>扫码登录</p>
                <img class="img" height="100" width="100" id="canvas" src="">
            </div>
            <p id="hint"></p>
        @endauth
    </div>
@endif
   @vite('resources/js/app.js')
<script>
    const url = '{{ $url }}';
    const get_token = '{{ $token }}';
</script>
</body>
</html>
