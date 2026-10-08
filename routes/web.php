<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Livewire\Alert\Search;
use App\Models\Alert;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::resource('/alert', AlertController::class)
        ->withoutMiddlewareFor(['index', 'show'], 'auth');

    Route::resource('/category', CategoryController::class);

    Route::resource('/customer', CustomerController::class);

    Route::prefix('/customer/{customer}')->group(function () {
        Route::resource('/contact', ContactController::class)->except(['index', 'show']);
    });

    Route::resource('/tag', TagController::class);

    Route::post('/api-token', function (Request $request) {
        $token = $request->user()->createToken('', ['tag.view','tag.delete']);
        return response()->json($token->plainTextToken);
    })->name('api-token.create');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'form'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
