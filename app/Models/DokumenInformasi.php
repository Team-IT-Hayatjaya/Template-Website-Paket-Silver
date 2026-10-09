<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenInformasi extends Model
{
    use HasFactory;

    protected $table = 'dokumen_informasi';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'ringkasan',
        'tahun',
        'file_path',
        'tipe_file',
        'ukuran_file',
        'dilihat',
        'diunduh',
        'is_published',
        'tanggal_terbit',
        'created_by',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'dilihat' => 'integer',
        'diunduh' => 'integer',
        'is_published' => 'boolean',
        'tanggal_terbit' => 'date',
    ];

    /**
     * Relasi ke kategori informasi.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriInformasi::class, 'kategori_id');
    }

    /**
     * Relasi ke pengguna/admin yang mengunggah dokumen.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
