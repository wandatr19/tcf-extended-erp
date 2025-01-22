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
    Route::post('/lkh/get_partner', [LKHController::class, 'get_partner']);
    Route::post('/lkh/get_part', [LKHController::class, 'get_part']);

    Route::get('/lppk', [LPPKController::class, 'index'])->name('lppk-main');
    Route::get('/lppk/input', [LPPKController::class, 'input'])->name('lppk-input');
    Route::post('/lppk/input/store', [LPPKController::class, 'store_request_lppk'])->name('lppk-store-request');
    Route::post('/lppk/datatable', [LPPKController::class, 'logbook_datatable']);
    Route::get('/lppk/monitor', [LPPKController::class, 'monitor'])->name('lppk-monitor');
    Route::get('/lppk/logbook', [LPPKController::class, 'logbook'])->name('lppk-logbook');


});




Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
