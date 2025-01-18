<?php

use App\Http\Controllers\LKHController;
use App\Http\Controllers\LPPKController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [LKHController::class, 'home'])->name('dashboard');
    Route::get('/lkh', [LKHController::class, 'index'])->name('lkh-main');
    Route::get('/lkh/input', [LKHController::class, 'input'])->name('lkh-input');
    Route::post('/lkh/store', [LKHController::class, 'input_lkh'])->name('lkh-store');
    Route::get('/lkh/monitor', [LKHController::class, 'monitor'])->name('lkh-monitor');
    Route::post('/lkh/get_customer', [LKHController::class, 'get_customer']);
    // Route::get('/login2', [LKHController::class, 'login2'])->name('login');

    Route::get('/lppk', [LPPKController::class, 'index'])->name('lppk-main');
    Route::get('/lppk/input', [LPPKController::class, 'input'])->name('lppk-input');
    Route::get('/lppk/monitor', [LPPKController::class, 'monitor'])->name('lppk-monitor');
    Route::get('/lppk/logbook', [LPPKController::class, 'logbook'])->name('lppk-logbook');


});




Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
