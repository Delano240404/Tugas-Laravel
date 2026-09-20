<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/about', function () {
    return 'Profil Toko: POS Barokah Mart menyediakan kebutuhan harian dan layanan transaksi kasir cepat.';
});

Route::get('/suppliers', function () {
    return view('supplier.index');
});