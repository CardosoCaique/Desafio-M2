<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GruposController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\CampanhasController;
use App\Http\Controllers\Api\ProdutosController;
use App\Http\Controllers\Api\DescontosController;

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

Route::group(['prefix' => 'campanhas'], function(){
    Route::get('show', [CampanhasController::class, 'show']);
    Route::post('create', [CampanhasController::class, 'store']);
    Route::put('update/{id}', [CampanhasController::class, 'update']);
    Route::get('delete/{id}', [CampanhasController::class, 'delete']);
});

Route::group(['prefix' => 'produtos'], function(){
    Route::get('show', [ProdutosController::class, 'show']);
    Route::post('create', [ProdutosController::class, 'store']);
    Route::put('update/{id}', [ProdutosController::class, 'update']);
    Route::get('delete/{id}', [ProdutosController::class, 'delete']);
});

Route::group(['prefix' => 'descontos'], function(){
    Route::get('show', [DescontosController::class, 'show']);
    Route::post('create', [DescontosController::class, 'store']);
    Route::put('update/{id}', [DescontosController::class, 'update']);
    Route::get('delete/{id}', [DescontosController::class, 'delete']);
});
