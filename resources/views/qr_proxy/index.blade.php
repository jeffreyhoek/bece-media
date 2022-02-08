@php
    use App\Models\QRCode;
    $search = app('request')->input('code');
    $item = QRCode::where('code', $search)
                   ->first();
    header("Location: https://$item->url/", true, 302);
    exit;
@endphp
