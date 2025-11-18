<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Auth;
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

// Language switcher route - must be before sitesetting middleware to work properly
Route::get('/language/{locale}', [\App\Http\Controllers\Frontend\LanguageController::class, 'switch'])->name('language.switch');

Route::group(['middleware' => 'sitesetting'], function () {

    Route::get('/', [PageHomeController::class, 'index'])->name('index');
    Route::get('/hakkimizda', [PageController::class, 'aboutUs'])->name('hakkimizda');
    Route::get('/hizmetlerimiz', [PageController::class, 'ourServices'])->name('hizmetlerimiz');
    Route::get('/iletisim', [PageController::class, 'contactUs'])->name('iletisim');
    Route::post('/iletisim', [PageController::class, 'contactStore'])->name('contact.store');
    Route::get('/galeri', [PageController::class, 'gallery'])->name('galeri');
    Route::get('/hizmet/{slug}', [PageController::class, 'serviceDetail'])->name('service.detail');

    Auth::routes();

    Route::get('/cikis', [AjaxController::class, 'logout'])->name('cikis');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
