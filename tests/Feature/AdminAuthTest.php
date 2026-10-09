<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Siapkan user admin pengujian
        User::create([
            'name' => 'Administrator PPID',
            'email' => 'admin@instansi.go.id',
            'password' => bcrypt('AdminPPID2026!'),
        ]);
    }

    /**
     * Tamu tanpa autentikasi dialihkan saat mengakses dasbor admin.
     */
    public function test_tamu_dialihkan_ke_halaman_login(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }

    /**
     * Halaman formulir login dapat diakses oleh publik/tamu.
     */
    public function test_halaman_login_dapat_dibuka(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Panel Administrasi PPID');
    }

    /**
     * Pengujian autentikasi login admin dengan kredensial valid.
     */
    public function test_admin_berhasil_login(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@instansi.go.id',
            'password' => 'AdminPPID2026!',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    /**
     * Pengujian penolakan login jika kata sandi salah.
     */
    public function test_login_gagal_jika_kredensial_salah(): void
    {
        $response = $this->from('/admin/login')->post('/admin/login', [
            'email' => 'admin@instansi.go.id',
            'password' => 'SandiSalah123!',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    /**
     * Pengujian admin keluar sistem (logout).
     */
    public function test_admin_berhasil_logout(): void
    {
        $user = User::where('email', 'admin@instansi.go.id')->first();

        $response = $this->actingAs($user)->post('/admin/logout');

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
