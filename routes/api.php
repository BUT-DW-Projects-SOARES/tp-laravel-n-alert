<?php

use App\Http\Controllers\Api\AlertController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function () {
    Route::get('/alert', [AlertController::class, 'index']);
    Route::get('/alert/{alert}', [AlertController::class, 'show']);
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/tag', TagController::class)->middleware('auth:sanctum');
});
