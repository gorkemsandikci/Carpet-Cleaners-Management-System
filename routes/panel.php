<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HomepageContentController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SiteSettingController;
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

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');

    Route::resource('service', ServiceController::class)->names('service')->except(['show']);
    Route::resource('gallery', GalleryController::class)->names('gallery')->except(['show']);
    Route::resource('homepage-content', HomepageContentController::class)->names('homepage-content')->except(['show']);
    Route::resource('contact-message', ContactMessageController::class)->names('contact-message')->only(['index', 'show', 'destroy']);

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/', [SiteSettingController::class, 'index'])->name('index');
        Route::post('/bulk-update', [SiteSettingController::class, 'updateBulk'])->name('bulk-update');
        Route::get('/create', [SiteSettingController::class, 'create'])->name('create');
        Route::post('/store', [SiteSettingController::class, 'store'])->name('store');
        Route::put('/{setting}', [SiteSettingController::class, 'update'])->name('update');
        Route::delete('/{setting}', [SiteSettingController::class, 'destroy'])->name('destroy');
    });

});

