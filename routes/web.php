<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckMerchantRole;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(CheckAdminRole::class)->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
});
Route::middleware(CheckMerchantRole::class)->group(function () {
    Route::get('/merchant', [UserController::class, 'index'])->name('merchant');
});
Route::middleware(CheckUserRole::class)->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});

require __DIR__.'/auth.php';
