<?php

use App\Http\Controllers\API\PaymentRequestAPI;
use App\Http\Resources\PaymentRequestResource;
use App\Models\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('payment_request',[PaymentRequestAPI::class,'index']);
Route::post('payment_request',[PaymentRequestAPI::class,'store']);
