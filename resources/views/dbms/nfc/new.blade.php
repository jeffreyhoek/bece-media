@extends('layouts.master')

@section('content')
@php
    use App\Models\NfcTags;
    $item = new NfcTags;
    $modelAttributes = Schema::getColumnListing('nfc_tags')
@endphp
<div>
        <h1>NFC New</h1>
        <form action="{!! action([\App\Http\Controllers\NfcController::class, 'store']) !!}" method="post">
            @csrf
            <label>
                url
            </label>
            <input type="text" id="url" name="url"/>
                <label>
                    tagValue
                </label>
                <input type="text" id="tagValue" name="tagValue"/>
        <input type="submit">
    </form>
</div>

@endsection
