<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackageController;
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


// User Dashboard Routes

Route::prefix('user')->group(function (){
    Route::get('dashboard', function(){
        return view('user.index');
    })->name('user.index');

    Route::get('profile', function(){
        return view('user.profile');
    })->name('user.profile');

    Route::get('team', function(){
        return view('user.team');
    })->name('user.team');

    Route::get('withdrawls', function(){
        return view('user.withdrawls');
    })->name('user.withdrawls');

    Route::get('bank-details', function(){
        return view('user.bank-details');
    })->name('user.bank-details');


});


// Admin  Dashboard Routes

Route::prefix('admin')->group(function (){

    Route::get('login', function(){
        return view('admin.login');
    })->name('admin.login');
  
    Route::get('reset-password', function(){
        return view('admin.reset-password');
    })->name('admin.reset-password');
  
    Route::get('dashboard', function(){
        return view('admin.index');
    })->name('admin.index');

    Route::get('profile', function(){
        return view('admin.profile');
    })->name('admin.profile');

    Route::get('team', function(){
        return view('admin.team');
    })->name('admin.team');

    Route::get('withdrawls', function(){
        return view('admin.withdrawls');
    })->name('admin.withdrawls');

    Route::get('bank-details', function(){
        return view('admin.bank-details');
    })->name('admin.bank-details');

    // Route::get('packages', function(){
    //     return view('admin.packages');
    // })->name('admin.packages');

    Route::resource('packages',PackageController::class);


});
