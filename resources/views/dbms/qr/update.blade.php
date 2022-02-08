@extends('layouts.master')

@section('content')

    @php
    use App\Models\QRCode;
    $item = QRCode::find(request()->route('id'));
    $modelAttributes = Schema::getColumnListing('q_r_codes')
@endphp
    <div class="update-container">
        <div class="update-container-inner">
            <h1>Update</h1>
            <form action="{!! action([\App\Http\Controllers\QrController::class, 'update']) !!}" method="post" class="update-form">
                @csrf
                @method('PUT')
                @csrf
                @foreach($item->toArray() as $key => $value)
                    @if($key === "type")
                        <select id="{{$key}}" name="{{$key}}" >
                            <option value="1" @if($value == 1) selected @endif>url</option>
                            <option value="2" @if($value == 2) selected @endif>mail</option>
                        </select>
                    @elseif( $key != "id" && $key != "created_at" && $key != "updated_at" && $key != "code")
                        <label>
                            {{$key}}
                        </label>
                        <input type="text" id="{{$key}}" name="{{$key}}" value="{{$value}}"/>
                    @else
                        <input type="hidden" id="{{$key}}" name="{{$key}}" value="{{$value}}"/>
                    @endif
                @endforeach
                <input type="submit">
            </form>
        </div>

    </div>
@endsection
