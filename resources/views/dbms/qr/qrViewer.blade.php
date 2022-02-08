@php
    $id = request()->route('id');
    //Needs to be updated to the actual url
    //This is a placeholder as a proof of concept
    use App\Models\QRCode;
    $item = QRCode::find(request()->route('id'));
    $url = "http://localhost:8000/index?code=".$item->code
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <a href="{{url("/dbms/qr")}}">Back</a>
    <div class="content-container">
        <img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl={{$url}}&choe=UTF-8" title="Link to Google.com" />
    </div>
</body>
</html>
