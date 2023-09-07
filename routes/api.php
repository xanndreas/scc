<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Selling
    Route::apiResource('sellings', 'SellingApiController');

    // Selling Detail
    Route::apiResource('selling-details', 'SellingDetailApiController');

    // Cart
    Route::apiResource('carts', 'CartApiController');

    // Purchasing
    Route::apiResource('purchasings', 'PurchasingApiController');

    // Purchasing Detail
    Route::apiResource('purchasing-details', 'PurchasingDetailApiController');

    // Offer Detail
    Route::apiResource('offer-details', 'OfferDetailApiController');

    // Offer
    Route::apiResource('offers', 'OfferApiController');

    // Inventory
    Route::apiResource('inventories', 'InventoryApiController');

    // Stock Opname
    Route::apiResource('stock-opnames', 'StockOpnameApiController');

    // Article Content
    Route::post('article-contents/media', 'ArticleContentApiController@storeMedia')->name('article-contents.storeMedia');
    Route::apiResource('article-contents', 'ArticleContentApiController');

    // Article Category
    Route::apiResource('article-categories', 'ArticleCategoryApiController');

    // Contact
    Route::post('contacts/media', 'ContactApiController@storeMedia')->name('contacts.storeMedia');
    Route::apiResource('contacts', 'ContactApiController');
});
