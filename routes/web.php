<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckMerchantRole;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/checkuser', function () {
    if (Auth::user()->role ==='admin') {
        return redirect()->intended(route('admin', absolute:false));
    }
    if (Auth::user()->role ==='merchant') {
        return redirect()->intended(route('merchant', absolute:false));
    }
    if (Auth::user()->role ==='user') {
        return redirect()->intended(route('user', absolute:false));
    }
})->middleware(['auth'])->name('checkuser');

Route::get('/dashboard', function () {
    if (Auth::user()->role ==='admin') {
        return redirect()->intended(route('admin', absolute:false));
    }
    if (Auth::user()->role ==='merchant') {
        return redirect()->intended(route('merchant', absolute:false));
    }
    if (Auth::user()->role ==='user') {
        return redirect()->intended(route('user', absolute:false));
    }
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(CheckAdminRole::class)->prefix('admin')->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::resource('categories', CategoryController::class);
});
Route::middleware(CheckMerchantRole::class)->group(function () {
    Route::get('/merchant', [UserController::class, 'index'])->name('merchant');
    // Route::resource('/users', [UserController::class]);
});
Route::middleware(CheckUserRole::class)->prefix('user')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::resource('merchants', MerchantController::class);
});

require __DIR__.'/auth.php';
