<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\CategoryController;


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/author'], function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'backend_home_page')->name('backend_home_page');
        });

        // Category Section
        Route::group(['prefix' => '/category'], function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/', 'Category_View')->name('category.view');
            });
        });
    });
});
