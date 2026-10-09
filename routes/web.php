<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaturanController as AdminPengaturanController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Resmi Instansi Pemerintah (Paket Silver)
|--------------------------------------------------------------------------
| Dikelola oleh PT Hayat Jaya Teknologi (HJT)
| Semua antarmuka berbahasa Indonesia
*/

// Rute Publik Standar (Paket Silver)
Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/profil', [PublicPageController::class, 'profil'])->name('profil');
Route::get('/berita', [PublicPageController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [PublicPageController::class, 'detailBerita'])->name('berita.detail');
Route::get('/galeri', [PublicPageController::class, 'galeri'])->name('galeri');
Route::get('/layanan', [PublicPageController::class, 'layanan'])->name('layanan');
Route::get('/publikasi', [PublicPageController::class, 'publikasi'])->name('publikasi');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [PublicPageController::class, 'kirimPengaduan'])
    ->middleware('throttle:10,1')
    ->name('kontak.kirim');
Route::get('/komponen', [PublicPageController::class, 'komponen'])->name('komponen');

// Autentikasi Panel Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Tamu (Guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Terautentikasi (Auth)
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Pengaturan PPID & Tema Dinamis
        Route::get('/pengaturan', [AdminPengaturanController::class, 'edit'])->name('pengaturan.edit');
        Route::put('/pengaturan', [AdminPengaturanController::class, 'update'])->name('pengaturan.update');
    });
});
