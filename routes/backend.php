<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SettingsController;


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/author'], function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'backend_home_page')->name('backend_home_page');
        });

        // User Section
        Route::group(['prefix' => '/user'], function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/', 'User_View')->name('user.view');
                Route::post('/store', 'User_Store')->name('user.store');
                Route::get('/edit/{id}', 'User_Edit');
                // Route::post('/update', 'Category_Update')->name('category.update');
                Route::get('/delete/{slug}', 'User_Delete')->name('user.delete');
            });
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

        // Orders Section
        Route::group(['prefix' => '/order'], function () {
            Route::controller(OrderController::class)->group(function () {
                Route::get('/', 'Order_View')->name('orders_view');
                Route::get('/deliverd/{id}', 'Order_Delivery')->name('product.delivery');
                // Route::post('/store', 'Product_Store')->name('products.store');
                // Route::get('/edit/{slug}', 'Product_Edit')->name('product.edit');
                // Route::post('/update/{slug}', 'Product_Update')->name('product.update');
                Route::get('/delete/{id}', 'Order_Delete')->name('order.delete');
            });
        });

        // Settings Section
        Route::group(['prefix' => '/settings'], function () {
            Route::group(['prefix' => '/social'], function () {
                Route::controller(SettingsController::class)->group(function () {
                    Route::get('/', 'Social')->name('social.setting');
                    Route::post('/store', 'Social_Store')->name('social.store');
                    Route::post('/update/{id}', 'Social_Update')->name('social.update');
                });
            });
        });
    });
});
