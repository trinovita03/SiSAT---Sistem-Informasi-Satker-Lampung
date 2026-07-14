<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Memanggil fungsi index di DashboardController saat halaman utama (/) diakses
Route::get('/', [DashboardController::class, 'index']);