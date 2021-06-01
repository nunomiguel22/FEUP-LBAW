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
Route::get('forgot-password', 'Auth\PasswordResetController@showPasswordReset')->name('password.request');
Route::post('forgot-password', 'Auth\PasswordResetController@sendPasswordReset')->name('password.email');
Route::get('reset-password/{token}', 'Auth\PasswordResetController@showPasswordEmailReset')->name('password.reset');
Route::post('reset-password', 'Auth\PasswordResetController@resetPassword')->name('password.update');
Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerifyController@verifyEmail')->name('verification.verify');
Route::get('email/verify', 'Auth\EmailVerifyController@showEmailNotVerified')->name('verification.notice');
Route::post('email/verify', 'Auth\EmailVerifyController@resendVerification')->name('verification.send');

// Admin
Route::get('admin', 'AdminController@showDefault')->name('admin');
Route::get('admin/sales', 'AdminController@showSales');
Route::get('admin/products', 'AdminController@showProducts');
Route::get('admin/products/add_product', 'AdminController@showNewGame');
Route::get('admin/products/{id}/edit', 'AdminController@showEditGame');
Route::put('admin/products/{id}/edit', 'GameController@update');
Route::post('admin/products/add_product', 'GameController@store');
Route::get('admin/products/{id}/keys', 'AdminController@showEditKeys');
Route::put('admin/products/{id}/keys', 'GameController@updateKeys');
Route::delete('admin/products/{id}/delete', 'GameController@delete');


// Products
Route::get('products', 'GameController@showProducts')->name('products');
Route::get('products/{id}', 'GameController@showProductPage');
Route::post('products/{id}/cart', 'PurchaseController@addProductToCart');
Route::delete('products/{id}/cart', 'PurchaseController@removeProductFromCart');


// Users
Route::get('user', 'UserController@showDefault')->name('user');
Route::get('user/edit', 'UserController@showGeneral');
Route::get('user/security', 'UserController@showSecurity');
Route::get('user/keys', 'UserController@showKeys');
Route::get('user/avatar', 'UserController@showAvatar');
Route::get('user/cart', 'PurchaseController@showProductCart');
Route::delete('user/cart', 'PurchaseController@removeAllFromCart');
Route::get('user/cart/checkout', 'PurchaseController@showCheckout')->middleware('verified');
Route::post('user/cart/checkout', 'PurchaseController@completeCheckout')->middleware('verified');
Route::get('user/profile', 'ProfileController@show')->name('profile');

// Review
Route::post('/reviews/products/{id}/review', 'ReviewController@addReview');


//API
Route::get('api/products/search', 'GameController@search');
Route::get('api/user/keys', 'PurchaseController@getKeys');
