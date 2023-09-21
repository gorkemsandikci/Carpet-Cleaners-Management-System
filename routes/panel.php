<?php

use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'auth'], function () {
    Route::get('', [CustomerController::class, 'index'])->name('customer.index');
});

Route::group(['middleware' => ['panelsetting', 'auth'], 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'customer'], function () {
        Route::get('', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::get('/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::put('/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
        Route::post('/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
        Route::post('/fetch-district', [CustomerController::class, 'fetchDistrict'])->name('fetchDistrict');
    });

});

