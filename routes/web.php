<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::group([
    'middleware' => 'auth',
], function () {

    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');

    Route::group([
        'namespace' => 'Person',
        'prefix' => 'person',
        'as' => 'person.'
    ], function () {
        Route::get('/orders', 'OrderController@index')
            ->name('orders.index');
        Route::get('/orders/{order}', 'OrderController@show')
            ->name('orders.show');
    });


    Route::group([
        'middleware' => 'is_admin',
        'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function () {
        Route::get('/orders', 'OrderController@index')
            ->name('home');
        Route::get('/orders/{order}', 'OrderController@show')
            ->name('orders-show');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
    });
});

Route::group([
    'prefix' => 'basket',
], function () {
    Route::get('/', 'BasketController@basket')
        ->name('basket');


    Route::get('/place', 'BasketController@order')
        ->name('basket-order');
    Route::post('/add/{product}', 'BasketController@basketAdd')
        ->name('basket-add');
    Route::post('/remove/{product}', 'BasketController@basketRemove')
        ->name('basket-remove');
    Route::post('/basket/place', 'BasketController@basketConfirm')
        ->name('basket-confirm');
});


Route::get('/', 'MainController@index')
    ->name('index');
Route::post('subscription/{product}', 'MainController@subscribe')
    ->name('subscription');


Route::get('/product/{product}', 'MainController@product')
    ->name('product');

Route::get('/categories', 'MainController@categories')
    ->name('categories');

Route::get('/category/{category}', 'MainController@category')
    ->name('category');

Route::get('/category/{category?}/product/{product}', 'MainController@productCategory')
    ->name('category_product');

Route::get('reset', 'ResetController@reset')
    ->name('reset_db');

