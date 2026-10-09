<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaturan_ppid', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi')->default('Pemerintah Kabupaten / Kota');
            $table->string('sub_nama_instansi')->default('Dinas Komunikasi dan Informatika');
            $table->string('nama_ppid')->default('PPID Utama');
            $table->string('warna_utama')->default('#1e3a8a');
            $table->string('warna_sekunder')->default('#b91c1c');
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('email_atasan_ppid')->nullable();
            $table->text('jam_layanan')->nullable();
            $table->text('maklumat_pelayanan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_ppid');
    }
};
