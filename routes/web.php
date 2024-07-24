<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;


Route::get('packages', function () {
    return view('packages');
})->name('packages');


Route::get('reset-password', function () {
    return view('reset-password');
})->name('reset-password');
Route::get('buy-package', function () {
    return view('buy-package');
})->name('buy-package');


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('category',CategoryController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
// AuthController
Route::get('register',[AuthController::class, 'create'])->name('register');
Route::post('register',[AuthController::class, 'signUp']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');
// ContactController
Route::get('contact', [ContactController::class, 'index'])->name('contact');
