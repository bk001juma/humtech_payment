<?php


use App\Http\Controllers\Payment\BusinessController;
use App\Http\Controllers\Payment\BusinessProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    Route::prefix('business')->group(function () {
        Route::get('/merchants',[BusinessController::class, 'index'])->name('merchants');
        Route::post('/merchant/store',[BusinessController::class, 'store'])->name('merchant.store');

//        Admin
        Route::get('/merchant/manage/{id}',[BusinessController::class, 'manage'])->name('merchant.manage');
//        All
        Route::get('/disbursements',[BusinessController::class, 'allDisbursements'])->name('admin.disbursements');
        Route::get('/transactions',[BusinessController::class, 'allTransactions'])->name('admin.transactions');


//        Merchant Transactions
        Route::get('/{id}/transactions',[BusinessController::class, 'transactions'])->name('business.transactions');
        Route::get('/{id}/disbursements',[BusinessController::class, 'disbursements'])->name('business.disbursements');



        Route::post('/merchant/product/store',[BusinessProductController::class, 'store'])->name('product.store');
    });
});
