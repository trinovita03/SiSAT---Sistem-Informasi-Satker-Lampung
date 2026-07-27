<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Memanggil fungsi index di DashboardController saat halaman utama (/) diakses
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// Route untuk halaman detail satker berdasarkan kementerian
Route::get('/kementerian/{id}', [DashboardController::class, 'detail'])->name('dashboard.detail');

// Route untuk halaman dashboard satker per satker
Route::get('/satker/{id}', [DashboardController::class, 'showSatkerDashboard'])->name('satker.dashboard');