<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

// Rute Halaman Utama & Informasi
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'Profil Toko: POS Barokah Mart menyediakan kebutuhan sehari-hari.';
});

Route::get('/suppliers', function () {
    return view('supplier.index');
});

// Rute Authentikasi (Login & Logout)
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Rute Terproteksi Login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rute Khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/categories', function () {
        return 'Halaman Kelola Kategori (Khusus Admin)';
    });
    Route::get('/products', function () {
        return 'Halaman Kelola Produk (Khusus Admin)';
    });
    
    // Latihan No. 1: Rute /users khusus admin
    Route::resource('users', UserController::class);
});

// Rute Kasir & Admin
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', function () {
        return 'Halaman Kasir (POS)';
    })->name('pos.index');
});