<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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

Route::get('/alert', [AlertController::class, 'index'])->name('alert.index');
Route::get('/alert/{alert}', [AlertController::class, 'show'])->name('alert.show');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/{customer}', [CustomerController::class, 'show'])->name('customer.show');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
