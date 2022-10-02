<?php

use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RespondentController;
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
Route::post('responses', [ResponseController::class, 'store']);
Route::get('responses/{link}', [ResponseController::class, 'show']);

Route::resource('respondents', RespondentController::class);

Route::controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('responses', [ResponseController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('quality', [ResponseController::class, 'getQuality']);
    Route::get('infosVR/{id}', [ResponseController::class, 'getVrInfos']);
});
