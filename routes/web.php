<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::group(['prefix' => '/'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'frontend_home_page')->name('frontend_home_page');
    });
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
