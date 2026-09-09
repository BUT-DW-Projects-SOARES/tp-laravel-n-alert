<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TagController;
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

Route::resource('/alert', AlertController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('/category', CategoryController::class);
Route::resource('/customer', CustomerController::class);

Route::prefix('/customer/{customer}')->group(function () {
    Route::resource('/contact', ContactController::class)->except(['index', 'show']);
});

Route::resource('/tag', TagController::class);
