<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add this route for the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});
