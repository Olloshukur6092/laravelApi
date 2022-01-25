<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\EmployesController;
use App\Http\Controllers\API\PayController;
use App\Http\Controllers\API\PublishController;
use App\Http\Controllers\API\PublishedController;
use App\Http\Controllers\API\PublisherController;
use App\Http\Controllers\API\PublishSubscriberController;
use App\Http\Controllers\API\RubrikaController;
use App\Http\Controllers\API\SubscriberFizikController;
use App\Http\Controllers\API\SubscriberYuridikController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('article', ArticleController::class);
Route::apiResource('type', TypeController::class);
Route::apiResource('rubrika', RubrikaController::class);
Route::apiResource('publisher', PublisherController::class);
Route::apiResource('publish', PublishController::class);
Route::apiResource('published', PublishedController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('employes', EmployesController::class);
Route::apiResource('sfizik', SubscriberFizikController::class);
Route::apiResource('syuridik', SubscriberYuridikController::class);
Route::apiResource('publishSub', PublishSubscriberController::class);
Route::apiResource('pay', PayController::class);