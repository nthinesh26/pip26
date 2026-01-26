<?php

use App\Http\Controllers\WishListController;

Route::middleware(['auth'])->group(function () {
	Route::get('/pip/profile/create-wishlist', [WishListController::class, 'wishListWindow']);
    Route::get('/pip/profile/create-wishlist/{wish_list}', [WishListController::class, 'wishListView']);
    Route::get('/pip/profile/view-wishlist/{wish_list}', [WishListController::class, 'wishListView']);
   Route::get('/pip/wishilist-create/confirmation', [WishListController::class, 'confirmWL']);

    Route::post('/pip/profile/wish-list', [WishListController::class, 'postWishList']);
});
