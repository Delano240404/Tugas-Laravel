<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Route Login & Logout
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route dengan Autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Transaksi POS
    Route::get('/pos', function () {
        return view('supplier.index');
    })->name('pos.index');

    Route::get('/pos/history', function () {
        return 'Halaman Riwayat Transaksi';
    })->name('pos.history');

    // Route Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/categories', function () {
            return 'Halaman Kategori';
        })->name('categories.index');

        Route::get('/products', function () {
            return 'Halaman Produk';
        })->name('products.index');

        Route::get('/report/sales', function () {
            return 'Halaman Laporan Penjualan';
        })->name('report.sales');

        Route::get('/users', function () {
            return 'Halaman Kelola Akun Kasir';
        })->name('users.index');
    });
});