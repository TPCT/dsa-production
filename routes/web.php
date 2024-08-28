<?php

use App\Models\Translation\Translation;
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


Route::prefix('{locale?}')
    ->middleware([
        \App\Http\Middleware\SetLocale::class,
        \App\Http\Middleware\StatusChecker::class
    ])
    ->group(function(){
        Route::controller(\App\Http\Controllers\SiteController::class)
            ->group(function(){
                Route::get('/', 'index')->name('site.index');
                Route::get('/about-us', 'aboutUs')->name('site.about-us');
                Route::any('/contact-us', 'contactUs')->name('site.contact-us');
            });

        Route::resource('news', \App\Http\Controllers\NewsController::class)->only('show');
        Route::get('/{page}', [\App\Http\Controllers\SiteController::class, 'show'])->name('page.show');

        Route::fallback([\App\Http\Controllers\SiteController::class, 'show']);
    });

