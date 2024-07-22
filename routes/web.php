<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('packages', function () {
    return view('packages');
})->name('packages');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');
Route::get('reset-password', function () {
    return view('reset-password');
})->name('reset-password');
Route::get('buy-package', function () {
    return view('buy-package');
})->name('buy-package');


Route::resource('category',CategoryController::class);