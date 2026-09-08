<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\CustomerController;
use App\Models\Alert;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/hello/{name?}', function ($name = 'Guest') {
    return $name;
});

Route::get('/alert', [AlertController::class, 'index']);
Route::get('/alert/{alert}', [AlertController::class, 'show']);

Route::get('/customer', [CustomerController::class, 'index']);
