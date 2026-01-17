<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\Payment\AirtelController;
use App\Http\Controllers\Payment\TigoController;
use App\Http\Controllers\Payment\VodacomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('vodacom')->group(function () {

    Route::get('create_session', [VodacomController::class, 'getSession']);
    Route::get('send_money', [VodacomController::class, 'sendToCustomer']);
});

Route::prefix('airtel')->group(function () {

    Route::get('get_token', [AirtelController::class, 'getToken']);
    Route::get('get_enc', [AirtelController::class, 'keys']);
    Route::get('collect', [AirtelController::class, 'collect']);
    Route::get('disbursement', [AirtelController::class, 'disbursement']);


    Route::post('callback', [AirtelController::class, 'callBack']);
});

Route::prefix('tigo')->group(function () {

    Route::get('get-token', [TigoController::class, 'getToken']);
    Route::get('make-payment', [TigoController::class, 'makePayment']);
    Route::post('callback', [TigoController::class, 'callback']);
});

Route::get('tigo-payment-test', [TigoController::class, 'collect']);


Route::prefix('payment')->group(function () {
    Route::post('/initiate', [PaymentController::class, 'makePayment']);
    Route::get('/check/status/{id}', [PaymentController::class, 'checkStatus']);
});
