<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\BlogController;



Route::group(['prefix' => '/'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'frontend_home_page')->name('frontend_home_page');
        Route::get('/product/details/{slug}', 'Product_Details')->name('product.details');
    });

    // Contact Route Section 
    Route::group(['prefix' => '/contact'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'Contact_View')->name('contact.view');
            Route::post('/send', 'Send_Message')->name('send.message');
            Route::get('/view', 'Admin_Contact_View')->name('admin_contact_view');
            Route::get('/delete/{id}', 'Admin_Contact_Delete')->name('contact.delete');
        });
    });

    // Contact Route Section 
    Route::group(['prefix' => '/blog'], function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('/', 'Blog')->name('blog.view');
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
            Route::get('/view', 'Show_Cart')->name('show_cart');
            Route::get('/remove/{id}', 'Cart_Product_Remove')->name('cart_product_remove');
        });
    });

    // Order Section
    Route::group(['prefix' => '/order'], function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/cash', 'Cash_Order')->name('cash_order');
            Route::get('/stripe/{total_price}', 'Stripe')->name('stripe');
            Route::post('stripe/{total_price}', 'stripePost')->name('stripe.post');
            Route::get('/view', 'View_Order')->name('order_view');
            Route::get('/cancel/{id}', 'Order_Cancel')->name('orders.destroy');
        });
    });
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
