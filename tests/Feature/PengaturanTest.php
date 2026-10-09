<?php

namespace Tests\Feature;

use App\Models\PengaturanPpid;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PengaturanTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Siapkan user admin
        $this->admin = User::create([
            'name' => 'Administrator PPID',
            'email' => 'admin@instansi.go.id',
            'password' => bcrypt('AdminPPID2026!'),
        ]);

        // Siapkan data pengaturan awal
        PengaturanPpid::create([
            'id' => 1,
            'nama_instansi' => 'Pemerintah Kabupaten Uji',
            'sub_nama_instansi' => 'Dinas Komunikasi dan Informatika Uji',
            'nama_ppid' => 'PPID Utama Uji',
            'warna_utama' => '#1e3a8a',
            'warna_sekunder' => '#b91c1c',
            'alamat' => 'Jl. Merdeka No. 10',
            'telepon' => '(021) 9876-5432',
            'email' => 'kontak@instansi.uji.go.id',
        ]);
    }

    /**
     * Tamu dilarang mengakses form pengaturan.
     */
    public function test_tamu_dialihkan_saat_akses_pengaturan(): void
    {
        $response = $this->get('/admin/pengaturan');

        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }

    /**
     * Admin dapat melihat halaman pengaturan.
     */
    public function test_admin_dapat_melihat_halaman_pengaturan(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/pengaturan');

        $response->assertStatus(200);
        $response->assertSee('Identitas Instansi & Pengendali Tema Standar', false);
        $response->assertSee('Pemerintah Kabupaten Uji');
    }

    /**
     * Pengaturan nama dan tema muncul secara dinamis di halaman publik.
     */
    public function test_pengaturan_terpampang_di_halaman_publik(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pemerintah Kabupaten Uji');
        $response->assertSee('PPID Utama Uji');
    }

    /**
     * Admin dapat memperbarui nama instansi dan warna tema dinamis.
     */
    public function test_admin_dapat_memperbarui_pengaturan_tema(): void
    {
        $response = $this->actingAs($this->admin)->put('/admin/pengaturan', [
            'nama_instansi' => 'Pemerintah Kota Baru',
            'sub_nama_instansi' => 'Dinas Komunikasi Baru',
            'nama_ppid' => 'PPID Utama Kota Baru',
            'warna_utama' => '#0f766e', // Teal
            'warna_sekunder' => '#c2410c',
            'telepon' => '081234567890',
            'email' => 'ppid@kotabaru.go.id',
            'alamat' => 'Jl. Protokol No. 1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.pengaturan.edit'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pengaturan_ppid', [
            'id' => 1,
            'nama_instansi' => 'Pemerintah Kota Baru',
            'warna_utama' => '#0f766e',
        ]);

        // Verifikasi halaman publik sekarang memiliki warna dan nama baru
        $publicResponse = $this->get('/');
        $publicResponse->assertSee('Pemerintah Kota Baru');
        $publicResponse->assertSee('#0f766e');
    }

    /**
     * Validasi gagal jika format heksadesimal warna salah.
     */
    public function test_validasi_menolak_format_warna_tidak_valid(): void
    {
        $response = $this->actingAs($this->admin)->put('/admin/pengaturan', [
            'nama_instansi' => 'Pemerintah Kota Baru',
            'nama_ppid' => 'PPID Utama Kota Baru',
            'warna_utama' => 'bukan-hex-color',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['warna_utama']);
    }

    /**
     * Admin dapat mengunggah logo instansi (format gambar WebP/PNG).
     */
    public function test_admin_dapat_mengunggah_logo(): void
    {
        $file = UploadedFile::fake()->image('logo_instansi.webp', 100, 100);

        $response = $this->actingAs($this->admin)->put('/admin/pengaturan', [
            'nama_instansi' => 'Pemerintah Kota Baru',
            'nama_ppid' => 'PPID Utama Kota Baru',
            'warna_utama' => '#1e3a8a',
            'logo' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $pengaturan = PengaturanPpid::find(1);
        $this->assertNotNull($pengaturan->logo_path);
        $this->assertFileExists(public_path($pengaturan->logo_path));

        // Bersihkan berkas setelah pengujian
        if (File::exists(public_path($pengaturan->logo_path))) {
            File::delete(public_path($pengaturan->logo_path));
        }
    }
}
