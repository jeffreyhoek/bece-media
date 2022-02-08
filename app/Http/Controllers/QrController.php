<?php

namespace App\Http\Controllers;

use App\Models\NfcTags;
use App\Models\QRCode;
use Illuminate\Http\Request;

class QrController extends Controller
{

    public function index(){
        return QRCode::all();
    }

    public function show($id){
        return QRCode::find($id);
    }

    public function store(Request $request)
    {
        $tag = QRCode::create($request->all());
        $tag->code = $tag->id;
        $tag->save();

        return redirect('dbms/qr');
    }

    public function update(Request $request, NfcTags $tag)
    {
        $post = QRCode::find($request->id);
        $post->url = $request->url;
        $post->type = $request->type;
        $post->save();

        return redirect('dbms/qr');
    }

    public function delete(Request $request)
    {
        QRCode::find($request->id)->delete();

        return redirect('dbms/qr');
    }

}
