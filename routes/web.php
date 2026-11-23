<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return redirect('/admin/dashboard');
});

// Halaman Admin
Route::prefix('admin')->group(function () {

    // Dashboard Inventaris
    Route::view('/dashboard', 'admin.dashboard')
        ->name('admin.dashboard');

    // Katalog Inventaris
    Route::view('/katalog', 'admin.katalog')
        ->name('admin.katalog');
});
