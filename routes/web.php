<?php

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
// Home
Route::get('/', 'HomepageController@show')->name('homepage');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Admin
Route::get('admin', 'AdminController@showDefault')->name('admin');
Route::get('admin/sales', 'AdminController@showSales');
Route::get('admin/products', 'AdminController@showProducts');
Route::get('admin/products/add_product', 'AdminController@showNewGame');
Route::get('admin/products/{id}/edit', 'AdminController@showEditGame');

// Products
Route::get('products', 'GameController@showProducts')->name('products');
Route::get('api/products/search', 'GameController@search');
Route::post('admin/products/add_product', 'GameController@store');
Route::put('admin/products/{id}/edit', 'GameController@update');
Route::delete('admin/products/{id}/delete', 'GameController@delete');

// Users
Route::get('user', 'UserController@showDefault')->name('user');
Route::get('user/edit', 'UserController@showGeneral');
Route::get('user/security', 'UserController@showSecurity');
Route::get('user/keys', 'PurchaseController@showKeys');
Route::get('api/user/keys', 'PurchaseController@getKeys');
Route::get('user/avatar', 'UserController@showAvatar');
Route::get('user/cart', 'PurchaseController@showProductCart');
Route::delete('cart/{id}', 'PurchaseController@removeProductFromCart');
Route::delete('user/cart', 'PurchaseController@removeAllFromCart');
