<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LKHController;
use App\Http\Controllers\LPPKController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasterUser\UserController;
use App\Http\Controllers\MasterUser\SectionController;
use App\Http\Controllers\MasterUser\DivisionController;
use App\Http\Controllers\MasterUser\PositionController;
use App\Http\Controllers\MasterUser\DepartmentController;
use App\Http\Controllers\Checksheet\ChecksheetOpController;
use App\Http\Controllers\MasterUser\OrganizationController;
use App\Http\Controllers\Checksheet\ChecksheetOPDataController;

Auth::routes();


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [LKHController::class, 'home'])->name('dashboard');

    Route::prefix('lkh')->group(function () {
        Route::get('/', [LKHController::class, 'index'])->name('lkh-main');
        Route::get('/input', [LKHController::class, 'input'])->name('lkh-input');
        Route::post('/store', [LKHController::class, 'input_lkh'])->name('lkh-store');
        Route::get('/monitor', [LKHController::class, 'monitor'])->name('lkh-monitor');
        Route::post('/datatable', [LKHController::class, 'datatable']);
        Route::post('/get_partner', [LKHController::class, 'get_partner']);
        Route::post('/get_part', [LKHController::class, 'get_part']);
    });

    Route::get('/lppk', [LPPKController::class, 'index'])->name('lppk-main');
    Route::get('/lppk/input', [LPPKController::class, 'input'])->name('lppk-input');
    Route::patch('/lppk/input_repair/{idLPPK}', [LPPKController::class, 'input_repair'])->name('lppk-input-repair');
    Route::post('/lppk/get_part', [LPPKController::class, 'get_part']);
    Route::get('/lppk/get_all_part/{idPart}', [LPPKController::class, 'get_all_part']);
    Route::post('/lkh/get_last_no_lppk', [LPPKController::class, 'getLastNoLppk']);
    Route::post('/lppk/input/store', [LPPKController::class, 'store_request_lppk'])->name('lppk-store-request');
    Route::post('/lppk/datatable', [LPPKController::class, 'logbook_datatable']);
    Route::get('/lppk/monitor', [LPPKController::class, 'monitor'])->name('lppk-monitor');
    Route::get('/lppk/logbook', [LPPKController::class, 'logbook'])->name('lppk-logbook');

    Route::prefix('checksheet-op')->group(function () {
        Route::get('/', [ChecksheetOpController::class, 'index'])->name('checksheet-op-form');
        Route::post('/get_machine', [ChecksheetOpController::class, 'get_machine']);
        Route::post('/get_homeline', [ChecksheetOpController::class, 'get_homeline']);

        Route::get('/list-approve', [ChecksheetOpController::class, 'index_approve'])->name('checksheet-op-approve');
        Route::post('/datatable-approve', [ChecksheetOpController::class, 'datatable_approve']);
        Route::patch('/{id}/approved', [ChecksheetOpController::class, 'approved_checksheet']);
        Route::delete('/{id}/delete', [ChecksheetOpController::class, 'delete']);
        Route::post('get-detail', [ChecksheetOpController::class, 'getDetail']);


        Route::get('/list-data', [ChecksheetOPDataController::class, 'list_data'])->name('checksheet-op-data');
        Route::post('/datatable', [ChecksheetOPDataController::class, 'datatable']);
        Route::post('/store-data', [ChecksheetOPDataController::class, 'store'])->name('checksheet-op-store');
        Route::get('/edit-checksheet/{id}', [ChecksheetOPDataController::class, 'edit'])->name('checksheet-op-edit');
        Route::patch('/update-checksheet', [ChecksheetOPDataController::class, 'update'])->name('checksheet-op-update');
        Route::patch('/{id}/complete', [ChecksheetOPDataController::class, 'complete'])->name('checksheet-op-complete');

    });

    Route::prefix('master-user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('master-user-index');
        Route::post('/store', [UserController::class, 'store'])->name('master-user-store');
        Route::delete('/{id}/delete', [UserController::class, 'delete']);
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('master-user-edit');
        Route::post('/datatable', [UserController::class, 'datatable']);
        Route::post('/get-org', [OrganizationController::class, 'get_organization']);
        Route::post('/get-div', [DivisionController::class, 'get_division']);
        Route::post('/get-dept', [DepartmentController::class, 'get_department']);
        Route::post('/get-section', [SectionController::class, 'get_section']);
        Route::post('/get-position', [PositionController::class, 'get_position']);

        Route::get('/organization', [OrganizationController::class, 'index'])->name('master-user-organization');
        Route::post('/organization/datatable', [OrganizationController::class, 'datatable']);
        Route::get('/division', [DivisionController::class, 'index'])->name('master-user-division');
        Route::post('/division/datatable', [DivisionController::class, 'datatable']);
        Route::get('/department', [DepartmentController::class, 'index'])->name('master-user-department');
        Route::post('/department/datatable', [DepartmentController::class, 'datatable']);
        Route::get('/section', [SectionController::class, 'index'])->name('master-user-section');
        Route::post('/section/datatable', [SectionController::class, 'datatable']);


    });


});




Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
