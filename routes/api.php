<?php

use App\Http\Controllers\Api\AlertController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/alert', [AlertController::class, 'index']);
    Route::get('/alert/{alert}', [AlertController::class, 'show']);
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/tag', TagController::class);
    Route::apiResource('/customer.contact', ContactController::class);
});
