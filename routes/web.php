<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Resmi Instansi Pemerintah (Paket Silver)
|--------------------------------------------------------------------------
| Dikelola oleh PT Hayat Jaya Teknologi (HJT)
| Semua antarmuka berbahasa Indonesia
*/

// Rute Publik Standar
Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/profil', [PublicPageController::class, 'profil'])->name('profil');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');

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
    });
});
