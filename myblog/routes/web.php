<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [HomeController::class, 'getHome']);
Route::get('category', [CategoryController::class, 'getIndex']);
Route::get('category/show/{id}', [CategoryController::class, 'getShow']);
Route::get('category/create', [CategoryController::class, 'getCreate']);
Route::get('category/edit/{id}', [CategoryController::class, 'getEdit']);

Route::get('category/index', [CategoryController::class, 'getIndex'])->name('category.index');
Route::put('edit/{id}', [CategoryController::class, "editData"])->name('category.update');