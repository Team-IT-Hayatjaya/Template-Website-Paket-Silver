<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanPpid extends Model
{
    use HasFactory;

    protected $table = 'pengaturan_ppid';

    protected $fillable = [
        'nama_instansi',
        'sub_nama_instansi',
        'nama_ppid',
        'warna_utama',
        'warna_sekunder',
        'logo_path',
        'favicon_path',
        'alamat',
        'telepon',
        'email',
        'jam_layanan',
        'maklumat_pelayanan',
    ];

    /**
     * Dapatkan URL berkas logo atau null jika belum ada.
     */
    public function getLogoUrlAttribute(): ?string
    {
        if ($this->logo_path && file_exists(public_path($this->logo_path))) {
            return asset($this->logo_path);
        }

        return null;
    }

    /**
     * Dapatkan URL favicon atau null jika belum ada.
     */
    public function getFaviconUrlAttribute(): ?string
    {
        if ($this->favicon_path && file_exists(public_path($this->favicon_path))) {
            return asset($this->favicon_path);
        }

        return asset('favicon.ico');
    }
}
