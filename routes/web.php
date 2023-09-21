<?php

use Illuminate\Support\Facades\Auth;
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

    Route::put('marketplaces/{cart}', 'MarketplaceController@update')->name('marketplaces.update');
    Route::post('marketplaces/{product}', 'MarketplaceController@store')->name('marketplaces.store');
    Route::post('marketplaces', 'MarketplaceController@checkout')->name('marketplaces.checkout');
    Route::delete('marketplaces/{cart}', 'MarketplaceController@delete')->name('marketplaces.delete');

    Route::get('cas/profile', 'CustomerAreasController@profile')->name('cas.profile');
    Route::get('cas/cart', 'CustomerAreasController@cart')->name('cas.cart');
    Route::get('cas/transaction', 'CustomerAreasController@transactionHistory')->name('cas.transaction-history');
    Route::get('cas/transaction/{selling}', 'CustomerAreasController@transactionDetail')->name('cas.transaction-detail');

    Route::get('blogs', 'BlogController@index')->name('blogs.index');
    Route::get('blogs/{slug}', 'BlogController@show')->name('blogs.show');

    Route::get('supplies', 'SupplyController@index')->name('supplies.index');
    Route::get('supplies/{supply}', 'SupplyController@show')->name('supplies.show');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::resource('roles', 'RolesController');

    // Users
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Category
    Route::resource('categories', 'CategoryController');

    // Product
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Selling
    Route::resource('sellings', 'SellingController')
        ->only(['index', 'show', 'update', 'destroy']);

    // Purchasing
    Route::resource('purchasings', 'PurchasingController')
        ->only(['index', 'show']);

    // Offer
    Route::get('offers/create/{product}', 'OfferController@createByProduct')->name('offers.createByProduct');
    Route::resource('offers', 'OfferController');

    // Inventory
    Route::resource('inventories', 'InventoryController')
        ->only(['index', 'show', 'store']);

    // Stock Opname
    Route::resource('stock-opnames', 'StockOpnameController');

    // Article Content
    Route::post('article-contents/media', 'ArticleContentController@storeMedia')->name('article-contents.storeMedia');
    Route::post('article-contents/ckmedia', 'ArticleContentController@storeCKEditorImages')->name('article-contents.storeCKEditorImages');
    Route::resource('article-contents', 'ArticleContentController');

    // Article Category
    Route::resource('article-categories', 'ArticleCategoryController');

    // Contact
    Route::post('contacts/media', 'ContactController@storeMedia')->name('contacts.storeMedia');
    Route::post('contacts/ckmedia', 'ContactController@storeCKEditorImages')->name('contacts.storeCKEditorImages');
    Route::resource('contacts', 'ContactController');

    // Supply
    Route::resource('supplies', 'SupplyController');

    // Setting
    Route::resource('settings', 'SettingController')->only(['index', 'update']);

    // Transaction
    Route::resource('transactions', 'TransactionController')->only(['index', 'update']);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

