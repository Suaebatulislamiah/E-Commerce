<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\LoginController;

// Frontend Route Page
Route::get('/', [FrontController::class, 'index'])->name('frontend');

// User Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

// Middleware auth untuk memastikan hanya user yang login bisa mengakses halaman
Route::middleware(['auth'])->group(function () {

    // Dashboard (semua user bisa mengakses)
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Group untuk Admin (Akses Semua CRUD)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/produk', ProdukController::class);
        //Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/pesanan', PesananController::class);
        Route::resource('/users', UserController::class);
        Route::resource('pelanggan', PelangganController::class);
    });

    // Group untuk Gudang (Akses CRUD Kategori dan Produk)
    Route::middleware(['role:gudang|admin'])->group(function () {
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/produk', ProdukController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
        Route::resource('pelanggan', PelangganController::class);
    });

    // Group untuk Pelanggan (Hanya CRUD Pesanan)
    Route::middleware(['role:pelanggan|admin'])->group(function () {
        Route::resource('/pesanan', PesananController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    });

});
