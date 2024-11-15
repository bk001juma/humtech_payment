<?php


use App\Http\Controllers\Payment\BusinessController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    Route::prefix('business')->group(function () {
        Route::get('/merchants',[BusinessController::class, 'index'])->name('merchants');
        Route::post('/merchant/store',[BusinessController::class, 'store'])->name('merchant.store');
        Route::get('/merchant/manage/{id}',[BusinessController::class, 'manage'])->name('merchant.manage');
    });
});
