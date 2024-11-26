<?php

use App\Http\Controllers\CurriculoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyMiddleware;

Route::get('curriculos', [CurriculoController::class, 'getIndex']);

Route::get('curriculos/show/{id}', [CurriculoController::class, 'getShow'])
->middleware(MyMiddleware::class)
->where('id', '[0-9]+');

Route::get('curriculos/create', [CurriculoController::class, 'getCreate']);

Route::get('curriculos/edit/{id}', [CurriculoController::class, 'getEdit'])
->where('id', '[0-9]+');
