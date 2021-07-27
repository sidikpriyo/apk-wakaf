<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

// User
Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/setting', [\App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
});

// Pengelola
Route::prefix('pengelola')->middleware(['auth', 'role:pengelola'])->group(function () {
    Route::resource('/lembaga', \App\Http\Controllers\Pengelola\LembagaController::class);
    Route::resource('/donatur', \App\Http\Controllers\Pengelola\DonaturController::class);
    Route::resource('/kategori', \App\Http\Controllers\Pengelola\KategoriController::class);
    Route::resource('/status-pembayaran', \App\Http\Controllers\Pengelola\StatusPembayaranController::class);
    Route::resource('/jenis-pembayaran', \App\Http\Controllers\Pengelola\JenisPembayaranController::class);
    Route::resource('/metode-pembayaran', \App\Http\Controllers\Pengelola\MetodePembayaranController::class);
    Route::resource('/kampanye', \App\Http\Controllers\Pengelola\KampanyeController::class);
    Route::resource('/donasi', \App\Http\Controllers\Pengelola\KampanyeController::class);
});

// Donatur
Route::prefix('donatur')->middleware(['auth', 'role:donatur'])->group(function () {
});

// Lembaga
Route::prefix('lembaga')->middleware(['auth', 'role:lembaga'])->group(function () {
});

require __DIR__ . '/auth.php';
