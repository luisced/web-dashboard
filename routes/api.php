<?php

use App\Http\Controllers\AssesoryController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('asesors', AsesorController::class);
Route::resource('assesories', AssesoryController::class);
Route::apiResource('categorias', CategoriaController::class);

