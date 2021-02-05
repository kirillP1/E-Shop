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

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/', 'MainController@index')
    ->name('index');

Route::get('/basket', 'BasketController@basket')
    ->name('basket');
Route::get('/basket/place', 'BasketController@order')
    ->name('order');
Route::post('/basket/add/{id}', 'BasketController@basketAdd')
    ->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')
    ->name('basket-remove');
Route::post('/basket/place', 'BasketController@basketConfirm')
    ->name('basket-confirm');


Route::get('/product/{product}', 'MainController@product')
    ->name('product');

Route::get('/categories', 'MainController@categories')
    ->name('categories');

Route::get('/category/{category}', 'MainController@category')
    ->name('category');

Route::get('/category/{category?}/product/{product}', 'MainController@productCategory')
    ->name('product_category');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
