<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\HomeSliderController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => '/author'], function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'backend_home_page')->name('backend_home_page');
            Route::get('/admin-logout', 'Admin_Logout')->name('admin_logout');
        });

        // User Section
        Route::group(['prefix' => '/user'], function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/', 'User_View')->name('user.view');
                Route::post('/store', 'User_Store')->name('user.store');
                Route::get('/edit/{id}', 'User_Edit');
                // Route::post('/update', 'Category_Update')->name('category.update');
                Route::get('/delete/{id}', 'User_Delete')->name('user.delete');
            });
        });
        // User Section
        Route::group(['prefix' => '/home-slider'], function () {
            Route::controller(HomeSliderController::class)->group(function () {
                Route::get('/', 'Home_Slider_View')->name('home_slider_view');
                Route::post('/store', 'Home_Slider_Store')->name('home_slider,store');
                Route::get('/delete/{id}', 'Slider_Delete')->name('slider.delete');
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
                Route::get('/search', 'Order_Search')->name('search');
            });
        });

        // Cart Section
        Route::group(['prefix' => '/cart'], function () {
            Route::controller(CartController::class)->group(function () {
                Route::get('/', 'View_Cart')->name('manage.cart');
            });
        });

        // Settings Section
        Route::group(['prefix' => '/settings'], function () {
            // Social Settings
            Route::group(['prefix' => '/social'], function () {
                Route::controller(SettingsController::class)->group(function () {
                    Route::get('/', 'Social')->name('social.setting');
                    Route::post('/store', 'Social_Store')->name('social.store');
                    Route::post('/update/{id}', 'Social_Update')->name('social.update');
                });
            });
            // Seo Settings
            Route::group(['prefix' => '/seo'], function () {
                Route::controller(SettingsController::class)->group(function () {
                    Route::get('/', 'Seo')->name('seo.setting');
                    Route::post('/store', 'Seo_Store')->name('seo.store');
                    Route::post('/update/{id}', 'Seo_Update')->name('seo.update');
                });
            });
            // Website Settings
            Route::group(['prefix' => '/website'], function () {
                Route::controller(SettingsController::class)->group(function () {
                    Route::get('/setting', 'Website')->name('website');
                    Route::post('/store', 'Website_Store')->name('website.store');
                    Route::post('/update/{id}', 'Website_Update')->name('website.update');
                });
            });
        });
    });
});
