<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//import controller
use App\Http\Controllers\AuthenticationController;
//register new user

//Route::post('/signup', [AuthenticationController::class, 'register']);
//
////login user
//Route::post('/signing', [AuthenticationController::class, 'signing']);
//
//Route::post('/sign-out', [AuthenticationController::class, 'logout']);

Route::Post('qr', [Controllers\QrController::class, 'store']);
Route::Put('qr', [Controllers\QrController::class, 'update']);
Route::Delete('qr', [Controllers\QrController::class, 'delete']);

Route::Post('nfc', [Controllers\NfcController::class, 'store']);
Route::Put('nfc', [Controllers\NfcController::class, 'update']);
Route::Delete('nfc', [Controllers\NfcController::class, 'delete']);

Route::get('qr', [Controllers\QrController::class, 'index']);
Route::get('qr/{id}', [Controllers\QrController::class, 'show']);

Route::get('nfc', [Controllers\NfcController::class, 'index']);
Route::get('nfc/{id}', [Controllers\NfcController::class, 'show']);
