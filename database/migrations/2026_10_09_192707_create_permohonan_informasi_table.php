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
        Schema::create('permohonan_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi')->unique()->index();
            $table->foreignId('status_id')->index()->constrained('status_permohonan');
            $table->string('kategori_pemohon'); // perorangan / badan_hukum / kelompok
            $table->string('nama_pemohon');
            $table->text('nik'); // Encrypted cast di Eloquent
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('identitas_file_path'); // Disimpan di storage private
            $table->string('surat_kuasa_file_path')->nullable();
            $table->string('akta_badan_hukum_file_path')->nullable();
            $table->text('rincian_informasi');
            $table->text('tujuan_penggunaan');
            $table->string('cara_memperoleh_informasi'); // melihat / salinan
            $table->string('cara_mendapat_salinan'); // langsung / pos / email
            $table->dateTime('tenggat_jawab')->nullable(); // Disiapkan nullable (fitur Gold)
            $table->dateTime('tenggat_diperpanjang')->nullable(); // Disiapkan nullable (fitur Gold)
            $table->text('catatan_internal')->nullable(); // Status manual internal admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_informasi');
    }
};
