<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['as' => 'customers.', 'namespace' => 'App\Http\Controllers\customer'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'HomeController@contacts')->name('contacts');

    Route::get('marketplaces', 'MarketplaceController@index')->name('marketplaces.index');

    Route::get('marketplaces/{slug}', 'MarketplaceController@show')->name('marketplaces.show');

    Route::get('cart', 'MarketplaceController@cart')->name('marketplaces.cart');

    Route::get('blogs', 'BlogController@index')->name('blogs.index');

    Route::get('blogs/{slug}', 'BlogController@show')->name('blogs.show');

    Route::get('supplies', 'SupplyController@index')->name('supplies.index');

});

//Route::group(['as' => 'customer.', 'namespace' => 'App\Http\Controllers\Customer', 'middleware' => ['auth']], function () {
//
//});
