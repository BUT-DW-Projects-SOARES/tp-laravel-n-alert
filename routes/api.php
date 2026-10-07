<?php

use App\Models\Alert;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/alert', fn() => Alert::all());
Route::get('/alert/{alert}', fn(Alert $alert) => $alert);

Route::get('/category', fn() => Category::all());
