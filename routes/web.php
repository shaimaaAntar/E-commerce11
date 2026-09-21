<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontEndController;
use Illuminate\Support\Facades\Route;

Route::controller(frontEndController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(BackendController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
})->middleware(['auth', 'verified', 'role:admin']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';