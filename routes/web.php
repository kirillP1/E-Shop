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
    Route::group([
        'middleware' => 'is_admin',
        'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function () {
        Route::get('/orders', 'OrderController@index')
            ->name('home');
        Route::resource('categories', 'CategoryController');
    });
    Route::post('/basket/place', 'BasketController@basketConfirm')
        ->name('basket-confirm');
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');

});


Route::get('/', 'MainController@index')
    ->name('index');

Route::group([
    'prefix' => 'basket',
], function () {
    Route::get('/', 'BasketController@basket')
        ->name('basket');
    Route::get('/place', 'BasketController@order')
        ->name('order');
    Route::post('/add/{id}', 'BasketController@basketAdd')
        ->name('basket-add');
    Route::post('/remove/{id}', 'BasketController@basketRemove')
        ->name('basket-remove');
});


Route::get('/product/{product}', 'MainController@product')
    ->name('product');

Route::get('/categories', 'MainController@categories')
    ->name('categories');

Route::get('/category/{category}', 'MainController@category')
    ->name('category');

Route::get('/category/{category?}/product/{product}', 'MainController@productCategory')
    ->name('product_category');



