<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GruposController;
use App\Http\Controllers\Api\CidadesController;

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

Route::group(['prefix' => 'grupos'], function(){
    Route::get('show', [GruposController::class, 'show']);
    Route::post('create', [GruposController::class, 'store']);
    Route::put('update/{id}', [GruposController::class, 'update']);
    Route::get('delete/{id}', [GruposController::class, 'delete']);
});

Route::group(['prefix' => 'cidades'], function(){
    Route::get('show', [CidadesController::class, 'show']);
    Route::post('create', [CidadesController::class, 'store']);
    Route::put('update/{id}', [CidadesController::class, 'update']);
    Route::get('delete/{id}', [CidadesController::class, 'delete']);
});
