@extends('layouts.master')

@section('content')

@php
    use App\Models\QRCode;
    $item = new QRCode;
    $modelAttributes = Schema::getColumnListing('q_r_codes')
@endphp
<div class="update-container">
    <div class="update-container-inner">
        <h1>New</h1>
        <form action="{!! action([\App\Http\Controllers\QrController::class, 'store']) !!}" method="post" class="update-form">
            @foreach($modelAttributes as $key)
                @if($key == "type")
                    <label>
                        {{$key}}
                    </label>
                    <select id="{{$key}}" name="{{$key}}" >
                        <option value="1">url</option>
                        <option value="2">mail</option>
                    </select>
                @elseif($key != "id" && $key != "created_at" && $key != "updated_at" && $key != "code")
                    <label>
                        {{$key}}
                    </label>
                    <input type="text" id="{{$key}}" name="{{$key}}"/>
                @endif
                    <input type="hidden" id="code" name="code" value="-1"/>
            @endforeach
            <input type="submit">
        </form>
    </div>

</div>

@endsection
