@extends('layouts.master')

@section('content')

@php
    use App\Models\NfcTags;
    $item = NfcTags::find(request()->route('id'));
    $modelAttributes = Schema::getColumnListing('nfc_tags')
@endphp


<div class="update-container">
    <div class="update-container-inner">
        <h1>Update</h1>
        <form action="{!! action([\App\Http\Controllers\NfcController::class, 'update']) !!}" method="post" class="update-form">
            @method('PUT')
            @csrf
            @foreach($item->toArray() as $key => $value)
                @if($key != "id" && $key != "created_at" && $key != "updated_at")
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
