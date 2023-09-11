<?php

use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
*/

//Route::group(['middleware' => ['auth'], 'prefix' => 'panel', 'as' => 'panel.'], function () {
//
//    Route::get('/', [DashboardController::class, 'index'])->name('index');
//
//    Route::group(['prefix' => 'category'], function () {
//        Route::get('', [CategoryController::class, 'index'])->name('category.index');
//        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
//        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
//        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
//        Route::put('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
//        Route::delete('/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
//        Route::post('/status-update', [CategoryController::class, 'statusUpdate'])->name('category.status');
//    });
//
//});


Route::group(['middleware' => 'panelsetting', 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'customer'], function () {
        Route::get('', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::put('/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
        Route::post('/status-update', [CustomerController::class, 'statusUpdate'])->name('customer.status');
        Route::post('/fetch-district', [CustomerController::class, 'fetchDistrict'])->name('fetchDistrict');
    });


});

