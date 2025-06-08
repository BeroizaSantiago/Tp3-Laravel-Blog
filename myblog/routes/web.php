<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('category/create', [CategoryController::class, 'getCreate'])->name('category.create');
    Route::get('category/delete/{id}', [PostController::class, 'destroy'])->name('category.delete');
    Route::get('category/edit/{id}', [PostController::class, 'edit'])->name('category.edit');
    Route::put('category/edit/{id}', [PostController::class, 'update'])->name('category.update');

    Route::resource('posts', PostController::class)->except(['index', 'show']);
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('category/show/{id}', [CategoryController::class, 'getShow'])->name('category.show');
Route::get('category/index', [CategoryController::class, 'getIndex'])->name('category.index');

Route::resource('posts', PostController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';