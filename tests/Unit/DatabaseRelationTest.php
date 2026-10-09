<?php

namespace Tests\Unit;

use App\Models\DokumenInformasi;
use App\Models\KategoriInformasi;
use App\Models\Keberatan;
use App\Models\LogAktivitas;
use App\Models\PengaturanPpid;
use App\Models\PermohonanInformasi;
use App\Models\StatusPermohonan;
use App\Models\User;
use Database\Seeders\KategoriInformasiSeeder;
use Database\Seeders\PengaturanPpidSeeder;
use Database\Seeders\StatusPermohonanSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseRelationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji relasi KategoriInformasi memiliki banyak DokumenInformasi.
     */
    public function test_kategori_informasi_memiliki_banyak_dokumen(): void
    {
        $kategori = KategoriInformasi::factory()->create();
        $dokumen1 = DokumenInformasi::factory()->create(['kategori_id' => $kategori->id]);
        $dokumen2 = DokumenInformasi::factory()->create(['kategori_id' => $kategori->id]);

        $this->assertCount(2, $kategori->dokumen);
        $this->assertTrue($kategori->dokumen->contains($dokumen1));
        $this->assertTrue($kategori->dokumen->contains($dokumen2));
    }

    /**
     * Uji relasi DokumenInformasi milik Kategori dan Creator User.
     */
    public function test_dokumen_informasi_milik_kategori_dan_creator(): void
    {
        $user = User::factory()->create();
        $kategori = KategoriInformasi::factory()->create();
        $dokumen = DokumenInformasi::factory()->create([
            'kategori_id' => $kategori->id,
            'created_by' => $user->id,
        ]);

        $this->assertInstanceOf(KategoriInformasi::class, $dokumen->kategori);
        $this->assertEquals($kategori->id, $dokumen->kategori->id);

        $this->assertInstanceOf(User::class, $dokumen->creator);
        $this->assertEquals($user->id, $dokumen->creator->id);
    }

    /**
     * Uji relasi StatusPermohonan memiliki banyak PermohonanInformasi.
     */
    public function test_status_permohonan_memiliki_banyak_permohonan(): void
    {
        $status = StatusPermohonan::factory()->create();
        $permohonan = PermohonanInformasi::factory()->create(['status_id' => $status->id]);

        $this->assertCount(1, $status->permohonan);
        $this->assertTrue($status->permohonan->contains($permohonan));
        $this->assertEquals($status->id, $permohonan->status->id);
    }

    /**
     * Uji NIK pada PermohonanInformasi dienkripsi di basis data (encrypted cast).
     */
    public function test_nik_pada_permohonan_terenkripsi_di_database(): void
    {
        $nikAsli = '3201123456780001';
        $permohonan = PermohonanInformasi::factory()->create([
            'nik' => $nikAsli,
        ]);

        // Nilai yang dibaca via model Eloquent sudah didekripsi otomatis
        $this->assertEquals($nikAsli, $permohonan->nik);

        // Ambil raw nilai langsung dari DB query untuk membuktikan NIK terenkripsi
        $rawRecord = DB::table('permohonan_informasi')->where('id', $permohonan->id)->first();
        $this->assertNotEquals($nikAsli, $rawRecord->nik);
        $this->assertStringStartsWith('eyJ', $rawRecord->nik); // Payload terenkripsi base64 Laravel
    }

    /**
     * Uji relasi Keberatan milik PermohonanInformasi.
     */
    public function test_keberatan_milik_permohonan_informasi(): void
    {
        $permohonan = PermohonanInformasi::factory()->create();
        $keberatan = Keberatan::factory()->create([
            'permohonan_id' => $permohonan->id,
            'nomor_registrasi_permohonan' => $permohonan->nomor_registrasi,
        ]);

        $this->assertInstanceOf(PermohonanInformasi::class, $keberatan->permohonan);
        $this->assertEquals($permohonan->id, $keberatan->permohonan->id);
        $this->assertTrue($permohonan->keberatan->contains($keberatan));
    }

    /**
     * Uji relasi LogAktivitas milik User.
     */
    public function test_log_aktivitas_milik_user(): void
    {
        $user = User::factory()->create();
        $log = LogAktivitas::factory()->create([
            'user_id' => $user->id,
            'aktivitas' => 'update',
        ]);

        $this->assertInstanceOf(User::class, $log->user);
        $this->assertEquals($user->id, $log->user->id);
        $this->assertIsArray($log->properties);
    }

    /**
     * Uji Seeder Kategori, Status Permohonan, dan Pengaturan PPID.
     */
    public function test_seeder_berjalan_dan_menghasilkan_data_standar(): void
    {
        $this->seed(KategoriInformasiSeeder::class);
        $this->seed(StatusPermohonanSeeder::class);
        $this->seed(PengaturanPpidSeeder::class);

        // Pastikan 4 kategori wajib ada
        $this->assertDatabaseHas('kategori_informasi', ['slug' => 'berkala']);
        $this->assertDatabaseHas('kategori_informasi', ['slug' => 'serta_merta']);
        $this->assertDatabaseHas('kategori_informasi', ['slug' => 'setiap_saat']);
        $this->assertDatabaseHas('kategori_informasi', ['slug' => 'dikecualikan']);

        // Pastikan 6 status wajib ada
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'diterima']);
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'diverifikasi']);
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'diproses']);
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'dijawab']);
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'ditolak']);
        $this->assertDatabaseHas('status_permohonan', ['slug' => 'selesai']);

        // Pastikan email_atasan_ppid tersimpan
        $pengaturan = PengaturanPpid::first();
        $this->assertNotNull($pengaturan->email_atasan_ppid);
    }
}
