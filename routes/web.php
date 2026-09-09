<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('/category', CategoryController::class);
Route::resource('/customer', CustomerController::class);

Route::prefix('/customer/{customer}')->group(function () {
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::patch('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/{contact}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
});
