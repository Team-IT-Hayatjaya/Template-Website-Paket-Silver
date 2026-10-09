<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermohonanInformasi extends Model
{
    use HasFactory;

    protected $table = 'permohonan_informasi';

    protected $fillable = [
        'nomor_registrasi',
        'status_id',
        'kategori_pemohon',
        'nama_pemohon',
        'nik',
        'alamat',
        'telepon',
        'email',
        'identitas_file_path',
        'surat_kuasa_file_path',
        'akta_badan_hukum_file_path',
        'rincian_informasi',
        'tujuan_penggunaan',
        'cara_memperoleh_informasi',
        'cara_mendapat_salinan',
        'tenggat_jawab',
        'tenggat_diperpanjang',
        'catatan_internal',
    ];

    /**
     * Casts atribut, termasuk NIK wajib dienkripsi otomatis di database.
     */
    protected function casts(): array
    {
        return [
            'nik' => 'encrypted',
            'tenggat_jawab' => 'datetime',
            'tenggat_diperpanjang' => 'datetime',
        ];
    }

    /**
     * Relasi ke status permohonan.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusPermohonan::class, 'status_id');
    }

    /**
     * Relasi ke keberatan yang diajukan untuk permohonan ini.
     */
    public function keberatan(): HasMany
    {
        return $this->hasMany(Keberatan::class, 'permohonan_id');
    }
}
