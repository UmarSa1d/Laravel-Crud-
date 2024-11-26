<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

// Route for home page
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman customers
Route::get('customers', [CustomerController::class, 'index']);

