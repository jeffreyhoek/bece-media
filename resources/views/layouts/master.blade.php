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
        @yield('content')
    </div>

</body>
</html>
