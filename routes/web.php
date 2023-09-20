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
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Selling
    Route::delete('sellings/destroy', 'SellingController@massDestroy')->name('sellings.massDestroy');
    Route::resource('sellings', 'SellingController');

    // Selling Detail
    Route::delete('selling-details/destroy', 'SellingDetailController@massDestroy')->name('selling-details.massDestroy');
    Route::resource('selling-details', 'SellingDetailController');

    // Cart
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');

    // Purchasing
    Route::delete('purchasings/destroy', 'PurchasingController@massDestroy')->name('purchasings.massDestroy');
    Route::resource('purchasings', 'PurchasingController');

    // Purchasing Detail
    Route::delete('purchasing-details/destroy', 'PurchasingDetailController@massDestroy')->name('purchasing-details.massDestroy');
    Route::resource('purchasing-details', 'PurchasingDetailController');

    // Offer Detail
    Route::delete('offer-details/destroy', 'OfferDetailController@massDestroy')->name('offer-details.massDestroy');
    Route::resource('offer-details', 'OfferDetailController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    // Inventory
    Route::delete('inventories/destroy', 'InventoryController@massDestroy')->name('inventories.massDestroy');
    Route::resource('inventories', 'InventoryController');

    // Stock Opname
    Route::delete('stock-opnames/destroy', 'StockOpnameController@massDestroy')->name('stock-opnames.massDestroy');
    Route::resource('stock-opnames', 'StockOpnameController');

    // Article Content
    Route::delete('article-contents/destroy', 'ArticleContentController@massDestroy')->name('article-contents.massDestroy');
    Route::post('article-contents/media', 'ArticleContentController@storeMedia')->name('article-contents.storeMedia');
    Route::post('article-contents/ckmedia', 'ArticleContentController@storeCKEditorImages')->name('article-contents.storeCKEditorImages');
    Route::resource('article-contents', 'ArticleContentController');

    // Article Category
    Route::delete('article-categories/destroy', 'ArticleCategoryController@massDestroy')->name('article-categories.massDestroy');
    Route::resource('article-categories', 'ArticleCategoryController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::post('contacts/media', 'ContactController@storeMedia')->name('contacts.storeMedia');
    Route::post('contacts/ckmedia', 'ContactController@storeCKEditorImages')->name('contacts.storeCKEditorImages');
    Route::resource('contacts', 'ContactController');

    // Supply
    Route::delete('supplies/destroy', 'SupplyController@massDestroy')->name('supplies.massDestroy');
    Route::resource('supplies', 'SupplyController');

    // Setting
    Route::resource('settings', 'SettingController')->only(['index', 'update']);

    // Transaction
    Route::resource('transactions', 'TransactionController')->only(['index', 'update']);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

