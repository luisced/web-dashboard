<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssesoryController;

Route::get('/', function () {
    return view('welcome');
});

// Add this route for the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard-results', [AssesoryController::class, 'dashboardResults']);
