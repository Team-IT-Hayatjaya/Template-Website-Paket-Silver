<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => env('ADMIN_DEFAULT_EMAIL', 'admin@instansi.go.id')],
            [
                'name' => env('ADMIN_DEFAULT_NAME', 'Administrator PPID'),
                'password' => bcrypt(env('ADMIN_DEFAULT_PASSWORD', 'AdminPPID2026!')),
                'email_verified_at' => now(),
            ]
        );

        $this->call(PengaturanPpidSeeder::class);
    }
}
