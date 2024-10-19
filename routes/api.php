<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('asesors', AsesorController::class);

// Add the route for CategoriaController
Route::apiResource('categorias', CategoriaController::class);
