<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\SubscriptionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Private Routes */
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/register', [AuthLoginController::class, 'register']);
    Route::post('/update', [AuthLoginController::class, 'update']);

    Route::post('/subscription', [SubscriptionController::class, 'add']);
});

// Public Routes
Route::post('/login', [AuthLoginController::class, 'login']);
