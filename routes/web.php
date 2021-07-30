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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengaturan', [\App\Http\Controllers\HomeController::class, 'pengaturan'])->name('pengaturan');
    Route::get('/notifikasi', [\App\Http\Controllers\HomeController::class, 'notifikasi'])->name('notifikasi');
});

// Pengelola
Route::prefix('pengelola')->middleware(['auth', 'role:pengelola'])->group(function () {
    Route::resource('/lembaga', \App\Http\Controllers\Pengelola\LembagaController::class);
    Route::resource('/donatur', \App\Http\Controllers\Pengelola\DonaturController::class);
    Route::resource('/kategori', \App\Http\Controllers\Pengelola\KategoriController::class);
    Route::resource('/status-pembayaran', \App\Http\Controllers\Pengelola\StatusPembayaranController::class);
    Route::resource('/jenis-pembayaran', \App\Http\Controllers\Pengelola\JenisPembayaranController::class);
    Route::resource('/metode-pembayaran', \App\Http\Controllers\Pengelola\MetodePembayaranController::class);
    Route::resource('/kampanye', \App\Http\Controllers\Pengelola\KampanyeController::class)->names('pengelola-kampanye');
    Route::resource('/donasi', \App\Http\Controllers\Pengelola\DonasiController::class)->names('pengelola-donasi');

    Route::get('/kampanye/{kampanye}/publikasi', [\App\Http\Controllers\Pengelola\KampanyeController::class, 'publikasi'])->name('pengelola-kampanye.publikasi');

});

// Donatur
Route::prefix('donatur')->middleware(['auth', 'role:donatur'])->group(function () {
    Route::resource('/kampanye', \App\Http\Controllers\Donatur\KampanyeController::class)->names('donatur-kampanye')->only(['index', 'show']);
    Route::resource('/donasi', \App\Http\Controllers\Donatur\DonasiController::class)->names('donatur-donasi')->only(['index', 'show']);
    Route::resource('/profil', \App\Http\Controllers\Donatur\DonaturController::class)->names('donatur-profil')->only(['index', 'edit', 'update']);
});

// Lembaga
Route::prefix('lembaga')->middleware(['auth', 'role:lembaga'])->group(function () {
    Route::resource('/kampanye', \App\Http\Controllers\Lembaga\KampanyeController::class)->names('lembaga-kampanye');
    Route::resource('/donasi', \App\Http\Controllers\Lembaga\DonasiController::class)->names('lembaga-donasi');
    Route::resource('/profil', \App\Http\Controllers\Lembaga\LembagaController::class)->names('lembaga-profil')->only(['index', 'edit', 'update']);
});

require __DIR__ . '/auth.php';
