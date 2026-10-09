<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('pengaturan_ppid')) {
                    $pengaturan = app(\App\Services\PengaturanService::class)->getPengaturan();
                } else {
                    $pengaturan = new \App\Models\PengaturanPpid([
                        'nama_instansi' => 'Pemerintah Kabupaten / Kota',
                        'sub_nama_instansi' => 'Dinas Komunikasi dan Informatika',
                        'nama_ppid' => 'PPID Utama',
                        'warna_utama' => '#1e3a8a',
                        'warna_sekunder' => '#b91c1c',
                    ]);
                }
            } catch (\Throwable $e) {
                $pengaturan = new \App\Models\PengaturanPpid([
                    'nama_instansi' => 'Pemerintah Kabupaten / Kota',
                    'sub_nama_instansi' => 'Dinas Komunikasi dan Informatika',
                    'nama_ppid' => 'PPID Utama',
                    'warna_utama' => '#1e3a8a',
                    'warna_sekunder' => '#b91c1c',
                ]);
            }

            $view->with('pengaturan', $pengaturan);
        });
    }
}
