<?php

use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\Api\AuthController;

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

Route::resource('questions', QuestionController::class);
Route::resource('responses', ResponseController::class);

Route::controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
