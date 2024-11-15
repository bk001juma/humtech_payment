<?php


use App\Http\Controllers\Payment\BusinessController;
use App\Http\Controllers\Payment\BusinessProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    Route::prefix('business')->group(function () {
        Route::get('/merchants',[BusinessController::class, 'index'])->name('merchants');
        Route::post('/merchant/store',[BusinessController::class, 'store'])->name('merchant.store');
        Route::get('/merchant/manage/{id}',[BusinessController::class, 'manage'])->name('merchant.manage');


        Route::post('/merchant/product/store',[BusinessProductController::class, 'store'])->name('product.store');
    });
});
