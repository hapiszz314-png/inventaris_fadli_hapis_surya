<?php

use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Rute asli
Route::get('/admin', [DasboardController::class, 'index'])->name('admin');

// Tambahkan rute ini agar jika mengetik /dashboard / /admin/dashboard tidak 404
Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard', [DasboardController::class, 'index']);
Route::resource('barang', BarangController::class);
Route::resource('barang', BarangController::class);