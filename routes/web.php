<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LKHController;
use App\Http\Controllers\LPPKController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Checksheet\ChecksheetOpController;
use App\Http\Controllers\Checksheet\ChecksheetOPDataController;

Auth::routes();


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [LKHController::class, 'home'])->name('dashboard');

    Route::prefix('lkh')->group(function () {
        Route::get('/', [LKHController::class, 'index'])->name('lkh-main');
        Route::get('/input', [LKHController::class, 'input'])->name('lkh-input');
        Route::post('/store', [LKHController::class, 'input_lkh'])->name('lkh-store');
        Route::get('/monitor', [LKHController::class, 'monitor'])->name('lkh-monitor');
        Route::post('/get_partner', [LKHController::class, 'get_partner']);
        Route::post('/get_part', [LKHController::class, 'get_part']);
    });

    Route::get('/lppk', [LPPKController::class, 'index'])->name('lppk-main');
    Route::get('/lppk/input', [LPPKController::class, 'input'])->name('lppk-input');
    Route::patch('/lppk/input_repair/{idLPPK}', [LPPKController::class, 'input_repair'])->name('lppk-input-repair');
    Route::post('/lkh/get_last_no_lppk', [LPPKController::class, 'getLastNoLppk']);
    Route::post('/lppk/input/store', [LPPKController::class, 'store_request_lppk'])->name('lppk-store-request');
    Route::post('/lppk/datatable', [LPPKController::class, 'logbook_datatable']);
    Route::get('/lppk/monitor', [LPPKController::class, 'monitor'])->name('lppk-monitor');
    Route::get('/lppk/logbook', [LPPKController::class, 'logbook'])->name('lppk-logbook');

    Route::prefix('checksheet-op')->group(function () {
        Route::get('/', [ChecksheetOpController::class, 'index'])->name('checksheet-op-form');
        Route::post('/get_machine', [ChecksheetOpController::class, 'get_machine']);
        Route::post('/get_homeline', [ChecksheetOpController::class, 'get_homeline']);

        Route::get('/list-data', [ChecksheetOPDataController::class, 'list_data'])->name('checksheet-op-data');
        Route::post('/datatable', [ChecksheetOPDataController::class, 'datatable']);
        Route::post('/store-data', [ChecksheetOPDataController::class, 'store'])->name('checksheet-op-store');
        Route::get('/edit-checksheet/{id}', [ChecksheetOPDataController::class, 'edit'])->name('checksheet-op-edit');
    });


});




Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
