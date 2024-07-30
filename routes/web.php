<?php

use Illuminate\Support\Facades\Route;
use App\Models\category;
use App\Models\Package;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashController;

// FrontEnd Routes
Route::get('/', [HomeController::class, 'packageShow'])->name('home');
Route::get('/contact', [HomeController::class, 'contactFormShow'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactForm']);

Route::get('packages', function () {
    $packages = Package::with('category')->get();
    return view('packages',compact('packages'));
})->name('packages');


Route::get('reset-password', function () {
    return view('reset-password');
})->name('reset-password');

Route::get('buy-package', function () {
    return view('buy-package');
})->name('buy-package');


// AuthController
Route::get('register',[AuthController::class, 'create'])->name('register');
Route::post('register',[AuthController::class, 'signUp']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('authenticate');


Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('user/{id}', [AuthController::class, 'updateStatus'])->name('user.updateStatus');





// User Dashboard Routes

Route::prefix('user')->group(function (){

        // Route::get('dashboard', function() {
        //     return view('user.index');
        // })->name('user.index');
        Route::get('/dashboard', [AuthController::class, 'Userindex'])->name('user.index');


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

    // Route::get('dashboard', function(){
    //     return view('admin.index');
    // })->middleware(['auth', 'verified'])->name('admin.index');
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function() {
            return view('admin.index');
        })->name('admin.index');
    });

    Route::get('/', function(){
        return redirect()->route('admin.index');
    });

    Route::get('profile', function(){
        return view('admin.profile');
    })->name('admin.profile');

    Route::get('users', [UserController::class,'index'])->name('admin.users');
    Route::get('users/create', [UserController::class,'create'])->name('admin.create_user');
    Route::get('users/{$id}/edit', [UserController::class,'edit'])->name('admin.edit_user');
    Route::get('users/{$id}/delete', [UserController::class,'destroy'])->name('admin.destroy_user');

    Route::get('withdrawls', function(){
        return view('admin.withdrawls');
    })->name('admin.withdrawls');

    Route::get('bank-details', function(){
        return view('admin.bank-details');
    })->name('admin.bank-details');

    Route::middleware('Auth')->group(function () {
        Route::resource('category',CategoryController::class);
        Route::resource('packages',PackageController::class);
    });
});

