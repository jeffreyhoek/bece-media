<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="nav-container">
    <a href="{{url("/dbms/qr")}}">QR</a> |
    <a href="{{url("/dbms/nfc")}}">NFC</a>
</div>
<br/>
<div class="content-container">
    <form action="{!! action([\App\Http\Controllers\AuthenticationController::class, 'register']) !!}" method="post">
        <input type="text" name="email" id="email">
        <input type="text" name="name" id="name">
        <input type="text" name="password" id="password">
        <input type="submit">
    </form>
</div>

</body>
</html>
