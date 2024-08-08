<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/author'], function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'backend_home_page')->name('backend_home_page');
        });

        // Category Section
        Route::group(['prefix' => '/category'], function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/', 'Category_View')->name('category.view');
                Route::post('/create', 'Category_Create')->name('category.create');
                Route::get('/edit/{id}', 'Category_Edit');
                Route::post('/update', 'Category_Update')->name('category.update');
                Route::get('/delete/{slug}', 'Category_Delete')->name('category.delete');
            });
        });

        // product Section
        Route::group(['prefix' => '/product'], function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('/', 'Product_View')->name('products.view');
                Route::get('/create', 'Products_Create')->name('products.create');
                Route::post('/store', 'Product_Store')->name('products.store');
                Route::get('/edit/{slug}', 'Product_Edit')->name('product.edit');
                Route::post('/update/{slug}', 'Product_Update')->name('product.update');
                Route::get('/delete/{slug}', 'Product_Delete')->name('product.delete');
            });
        });
    });
});
