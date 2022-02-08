<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['domain' => 'proxy.realret.dev'], function()
{
    Route::get('/index', function()
    {
        return view('qr_proxy/index');
    });

});

//'domain' => 'localhost'

    Route::group([], function(){
        Route::get('index', function()
        {
            return view('qr_proxy/index');
        });

        Route::get('/', function () {
            return view('dbms/nfc/index');
        });

        //dbms nfc
        Route::get('/dbms/nfc', function () {
            return view('dbms/nfc/index');
        });

        Route::get('/dbms/nfc/new', function () {
            return view('dbms/nfc/new');
        });

        Route::get('/dbms/nfc/update/{id}', function ($id) {
            return view('dbms/nfc/update', ['id' => $id]);
        });

        //dbms qr
        Route::get('/dbms/qr', function () {
            return view('dbms/qr/index');
        });

        Route::get('/dbms/qr/new', function () {
            return view('dbms/qr/new');
        });

        Route::get('/dbms/qr/update/{id}', function ($id) {
            return view('dbms/qr/update', ['id' => $id]);
        });

        Route::get('/dbms/qr/view/{id}', function ($id) {
            return view('dbms/qr/qrViewer', ['id' => $id]);
        });
    });

    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/register', function () {
        return view('register');
    });
