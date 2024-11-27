<?php

use App\Http\Controllers\CurriculoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyMiddleware;

Route::group(['prefix' => 'curriculos'], function(){
    Route::get('/', [CurriculoController::class, 'getIndex']);

    Route::get('/show/{id}', [CurriculoController::class, 'getShow'])
    ->middleware(MyMiddleware::class)
    ->where('id', '[0-9]+');

    Route::get('/create', [CurriculoController::class, 'getCreate']);

    Route::get('/edit/{id}', [CurriculoController::class, 'getEdit'])
    ->where('id', '[0-9]+');
});


