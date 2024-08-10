<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CartController;



Route::group(['prefix' => '/'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'frontend_home_page')->name('frontend_home_page');
        Route::get('/product/details/{slug}', 'Product_Details')->name('product.details');
    });

    // Contact Route Section 
    Route::group(['prefix' => '/contact'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'Contact_View')->name('contact.view');
        });
    });

    // Product Route Section 
    Route::group(['prefix' => '/product'], function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'Product_View')->name('product.view');
        });
    });

    Route::group(['prefix' => '/cart'], function () {
        Route::controller(CartController::class)->group(function () {
            Route::post('/{slug}', 'Add_To_Cart')->name('add_cart');
        });
    });
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
