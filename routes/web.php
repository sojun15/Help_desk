<?php

use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Group all web routes
Route::middleware('web')->group(function () {

    Route::get('/', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');

    Route::get('/signup', function () {
        return view('signup');
    });

    Route::post('/signup', [UserController::class, 'storeData'])->name('signupUser');

    Route::get('/dashboard', [HelpdeskController::class, 'dashboardPage'])
        ->middleware('auth')
        ->name('dashboard');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/helpdesk_open', function () {
        return view('helpdesk_form');
    })->name('helpdesk');

    Route::post('/helpdesk', [HelpdeskController::class, 'StoreTask'])->name('helpdesk_form');
});
