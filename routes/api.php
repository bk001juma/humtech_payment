<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\PostController;
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

    Route::get('create_session', [VodacomController::class, 'createSession']);

});
