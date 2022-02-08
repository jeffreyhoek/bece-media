<?php

namespace App\Http\Controllers;

use App\Models\NfcTags;
use Illuminate\Http\Request;

class NfcController extends Controller
{
    public function index(){
        return NfcTags::all();
    }

    public function show($tag){
        return NfcTags::where('tagValue', $tag )->first();
    }

    public function store(Request $request)
    {
        $tag = NfcTags::create($request->all());

        return redirect('dbms/nfc');
    }

    public function update(Request $request, NfcTags $tag)
    {
        $post = NfcTags::find($request->id);
        $post->tagValue = $request->tagValue;
        $post->url = $request->url;
        $post->save();

        return redirect('dbms/nfc');
    }

    public function delete(Request $request)
    {
        NfcTags::find($request->id)->delete();

        return redirect('dbms/nfc');
    }
}
