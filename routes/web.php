<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'sitesetting'], function () {

    Route::get('/', [PageHomeController::class, 'index'])->name('index');
    Route::get('/hakkimizda', [PageController::class, 'aboutUs'])->name('hakkimizda');
    Route::get('/hizmetlerimiz', [PageController::class, 'ourServices'])->name('hizmetlerimiz');
    Route::get('/iletisim', [PageController::class, 'contactUs'])->name('iletisim');
    Route::get('/galeri', [PageController::class, 'gallery'])->name('galeri');

});


