<?php

namespace App\Services;

class ContentDataService
{
    /**
     * Dapatkan daftar berita dan pengumuman.
     */
    public function getBerita(int $limit = 6, ?string $kategori = null): array
    {
        $all = [
            [
                'id' => 1,
                'slug' => 'pemerintah-luncurkan-portal-keterbukaan-informasi-publik',
                'judul' => 'Pemerintah Luncurkan Portal Keterbukaan Informasi Publik Terpadu',
                'kategori' => 'Keterbukaan Informasi',
                'tanggal' => '09 Oktober 2026',
                'penulis' => 'Humas PPID',
                'ringkasan' => 'Optimalisasi pelayanan informasi publik sesuai amanat UU No. 14 Tahun 2008 dengan penyediaan Daftar Informasi Publik secara transparan dan mudah diakses masyarakat.',
                'isi' => 'Pemerintah daerah resmi meluncurkan portal layanan Pejabat Pengelola Informasi dan Dokumentasi (PPID) terpadu. Langkah ini diambil guna memperkuat implementasi Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. Melalui portal ini, masyarakat dapat dengan mudah mengakses dokumen informasi berkala, mengajukan permohonan informasi publik secara daring, serta menyampaikan keberatan apabila terdapat kendala dalam pemenuhan hak informasi. Kepala Dinas menyampaikan bahwa transparansi adalah pilar utama pelayanan masyarakat di era keterbukaan.',
                'gambar' => null,
            ],
            [
                'id' => 2,
                'slug' => 'bimtek-pengelolaan-dokumentasi-dan-pelayanan-ppid',
                'judul' => 'Bimtek Pengelolaan Dokumentasi & Pelayanan PPID bagi Perangkat Daerah',
                'kategori' => 'Kegiatan',
                'tanggal' => '07 Oktober 2026',
                'penulis' => 'Bidang Informasi Publik',
                'ringkasan' => 'Kegiatan bimbingan teknis peningkatan kompetensi pengelola informasi publik dalam melayani permohonan informasi serta penyusunan klasifikasi dokumen berkala.',
                'isi' => 'Dinas Komunikasi dan Informatika menyelenggarakan Bimbingan Teknis Pengelolaan Arsip dan Dokumentasi PPID bagi seluruh unit perangkat daerah. Bimtek ini bertujuan menyamakan persepsi dalam pengklasifikasian informasi berkala, serta-merta, dan setiap saat. Diharapkan seluruh instansi mampu merespon permohonan informasi masyarakat dengan cepat, tepat waktu, dan berorientasi pada kepuasan publik.',
                'gambar' => null,
            ],
            [
                'id' => 3,
                'slug' => 'pengumuman-jadwal-pelayanan-meja-ppid-triwulan-iv',
                'judul' => 'Pengumuman Jadwal Pelayanan Meja PPID Selama Periode Triwulan IV',
                'kategori' => 'Pengumuman',
                'tanggal' => '04 Oktober 2026',
                'penulis' => 'Sekretariat PPID',
                'ringkasan' => 'Informasi penyesuaian jam operasional tatap muka pelayanan permohonan informasi publik dan konsultasi dokumen luring di lobi kantor dinas.',
                'isi' => 'Diberitahukan kepada seluruh warga masyarakat bahwa jam operasional Meja Layanan Langsung PPID untuk periode Triwulan IV tetap beroperasi normal setiap hari kerja: Senin - Kamis pukul 08.00 - 15.30 WIB dan Jumat pukul 08.00 - 15.00 WIB. Pemohon disarankan membawa kartu identitas diri yang sah saat berkunjung langsung ke meja layanan.',
                'gambar' => null,
            ],
            [
                'id' => 4,
                'slug' => 'sosialisasi-uji-konsekuensi-informasi-dikecualikan',
                'judul' => 'Sosialisasi Hasil Uji Konsekuensi Informasi yang Dikecualikan',
                'kategori' => 'Keterbukaan Informasi',
                'tanggal' => '28 September 2026',
                'penulis' => 'Tim Advokasi PPID',
                'ringkasan' => 'Penyampaian ringkasan hasil pengujian konsekuensi terhadap informasi yang dikecualikan sesuai dengan Pasal 17 UU No. 14 Tahun 2008.',
                'isi' => 'PPID Utama telah menyelesaikan rapat pleno penetapan klasifikasi informasi yang dikecualikan berdasarkan uji konsekuensi yang ketat. Hasil pengujian memastikan perlindungan terhadap data pribadi, rahasia negara, dan strategi penegakan hukum tanpa mengurangi hak masyarakat atas informasi terbuka lainnya.',
                'gambar' => null,
            ],
            [
                'id' => 5,
                'slug' => 'penghargaan-keterbukaan-informasi-badan-publik-terbaik',
                'judul' => 'Raih Predikat Badan Publik Informatif Tingkat Provinsi Tahun 2026',
                'kategori' => 'Prestasi',
                'tanggal' => '20 September 2026',
                'penulis' => 'Humas Protokol',
                'ringkasan' => 'Komisi Informasi Provinsi memberikan apresiasi predikat Informatif atas komitmen penyediaan informasi publik yang konsisten.',
                'isi' => 'Pemerintah daerah kembali meraih predikat Badan Publik Informatif dengan skor 98,5 dalam evaluasi kepatuhan keterbukaan informasi publik tahun 2026. Penghargaan ini menjadi motivasi untuk terus meningkatkan kualitas pelayanan informasi bagi masyarakat luas.',
                'gambar' => null,
            ],
            [
                'id' => 6,
                'slug' => 'konsultasi-publik-rancangan-peraturan-daerah-infrastruktur',
                'judul' => 'Konsultasi Publik Rancangan Peraturan Daerah Penataan Wilayah',
                'kategori' => 'Kegiatan',
                'tanggal' => '15 September 2026',
                'penulis' => 'Humas Sekretariat',
                'ringkasan' => 'Masyarakat diundang memberikan masukan dan saran terkait draf Rancangan Peraturan Daerah Penataan Wilayah Terbuka Hijau.',
                'isi' => 'Dalam rangka penyusunan kebijakan partisipatif, naskah akademik dan rancangan perda dapat diunduh melalui menu Publikasi Dokumen. Masukan dapat dikirimkan melalui meja konsultasi atau kanal kontak resmi yang tersedia.',
                'gambar' => null,
            ],
        ];

        if ($kategori) {
            $filtered = array_filter($all, fn($item) => strtolower($item['kategori']) === strtolower($kategori));
            return array_slice(array_values($filtered), 0, $limit);
        }

        return array_slice($all, 0, $limit);
    }

    /**
     * Dapatkan detail satu berita berdasarkan slug.
     */
    public function findBeritaBySlug(string $slug): ?array
    {
        $all = $this->getBerita(100);
        foreach ($all as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }
        return null;
    }

    /**
     * Dapatkan daftar agenda kegiatan instansi.
     */
    public function getAgenda(): array
    {
        return [
            [
                'tanggal' => '15 Oktober 2026',
                'waktu' => '09.00 WIB',
                'acara' => 'Sosialisasi Hak Masyarakat atas Keterbukaan Informasi Publik',
                'lokasi' => 'Aula Gedung Pertemuan Lt. 3',
            ],
            [
                'tanggal' => '22 Oktober 2026',
                'waktu' => '13.30 WIB',
                'acara' => 'Rapat Koordinasi Pengelola PPID Pelaksana se-Kabupaten/Kota',
                'lokasi' => 'Ruang Rapat Utama Sekretariat Daerah',
            ],
            [
                'tanggal' => '05 November 2026',
                'waktu' => '08.30 WIB',
                'acara' => 'Uji Publik Pemutakhiran Daftar Informasi Publik Semester II',
                'lokasi' => 'Balai Media Center Diskominfo',
            ],
        ];
    }

    /**
     * Dapatkan daftar profil pimpinan dan pejabat instansi.
     */
    public function getPejabat(): array
    {
        return [
            [
                'nama' => 'Dr. H. Raden Santoso, M.Si.',
                'jabatan' => 'Kepala Dinas / Atasan PPID',
                'nip' => '19750812 199903 1 002',
                'pendidikan' => 'S3 Kebijakan Publik Universitas Indonesia',
            ],
            [
                'nama' => 'Ir. Siti Rahmawati, M.T.',
                'jabatan' => 'Sekretaris Dinas / Ketua PPID Utama',
                'nip' => '19800415 200312 2 001',
                'pendidikan' => 'S2 Teknik Informatika Institut Teknologi Bandung',
            ],
            [
                'nama' => 'Bambang Supriyadi, S.Kom., M.Eng.',
                'jabatan' => 'Kepala Bidang Pengelolaan Informasi Publik',
                'nip' => '19850620 200801 1 003',
                'pendidikan' => 'S2 Sistem Informasi Universitas Gadjah Mada',
            ],
            [
                'nama' => 'Dewi Anggraini, S.H., M.H.',
                'jabatan' => 'Kepala Subbagian Hukum & Advokasi Sengketa PPID',
                'nip' => '19890210 201101 2 004',
                'pendidikan' => 'S2 Hukum Tata Negara Universitas Diponegoro',
            ],
        ];
    }

    /**
     * Dapatkan daftar layanan publik instansi.
     */
    public function getLayanan(): array
    {
        return [
            [
                'id' => 'permohonan-informasi',
                'nama' => 'Pelayanan Permohonan Informasi Publik (PPID)',
                'deskripsi' => 'Layanan pemberian akses dan salinan dokumen publik kepada warga negara atau badan hukum sesuai UU No. 14/2008.',
                'persyaratan' => [
                    'Fotokopi / Scan KTP pemohon perseorangan atau Akta Pendirian bagi badan hukum.',
                    'Mengisi formulir permohonan informasi secara lengkap.',
                    'Menyertakan surat kuasa apabila dikuasakan kepada pihak lain.',
                ],
                'alur' => '1. Pengajuan Formulir -> 2. Verifikasi Berkas (1-2 hari) -> 3. Pemberitahuan Tertulis (maks. 10 hari kerja) -> 4. Penyerahan Dokumen.',
                'biaya' => 'Gratis (Rp 0). Biaya fotokopi atau media rekam mandiri ditanggung pemohon.',
                'waktu' => 'Maksimal 10 (sepuluh) hari kerja, dapat diperpanjang 7 hari kerja.',
            ],
            [
                'id' => 'keberatan-informasi',
                'nama' => 'Pelayanan Pengajuan Keberatan Informasi Publik',
                'deskripsi' => 'Fasilitas keberatan apabila permohonan informasi tidak ditanggapi, ditolak, atau biaya tidak wajar.',
                'persyaratan' => [
                    'Nomor tanda bukti registrasi permohonan awal.',
                    'Kartu identitas pemohon yang masih berlaku.',
                    'Alasan pengajuan keberatan yang jelas dan objektif.',
                ],
                'alur' => '1. Pengajuan Formulir Keberatan -> 2. Diteruskan ke Atasan PPID -> 3. Tanggapan Tertulis Atasan PPID (maks. 30 hari kerja).',
                'biaya' => 'Gratis (Rp 0).',
                'waktu' => 'Maksimal 30 (tiga puluh) hari kerja sejak keberatan dicatat.',
            ],
            [
                'id' => 'konsultasi-luring',
                'nama' => 'Layanan Meja Informasi & Konsultasi Tatap Muka',
                'deskripsi' => 'Konsultasi langsung di meja lobi kantor dinas terkait ketersediaan informasi publik dan petunjuk teknis.',
                'persyaratan' => [
                    'Kunjungan langsung pada jam kerja kedinasan.',
                    'Mengisi buku tamu pelayanan PPID.',
                ],
                'alur' => '1. Datang ke Meja Layanan -> 2. Petugas memberikan penjelasan dan memandu pengisian dokumen.',
                'biaya' => 'Gratis (Rp 0).',
                'waktu' => 'Langsung pada saat kunjungan kerja.',
            ],
        ];
    }

    /**
     * Dapatkan daftar publikasi dan dokumen resmi instansi.
     */
    public function getPublikasi(): array
    {
        return [
            [
                'judul' => 'Rencana Strategis (Renstra) Dinas Komunikasi & Informatika 2024 - 2029',
                'keterangan' => 'Rencana strategis jangka menengah dinas dalam transformasi digital daerah.',
                'kategori' => 'Rencana Strategis',
                'tahun' => '2024',
                'format' => 'PDF',
                'ukuran' => '4.2 MB',
                'url' => '#',
            ],
            [
                'judul' => 'Rencana Kerja Pemerintah Daerah (RKPD) Tahun Anggaran 2026',
                'keterangan' => 'Dokumen perencanaan tahunan arah pembangunan dan penganggaran daerah.',
                'kategori' => 'Perencanaan',
                'tahun' => '2026',
                'format' => 'PDF',
                'ukuran' => '3.5 MB',
                'url' => '#',
            ],
            [
                'judul' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP) Tahun 2025',
                'keterangan' => 'Laporan capaian indikator kinerja utama dan realisasi program kerja dinas.',
                'kategori' => 'Laporan Kinerja',
                'tahun' => '2025',
                'format' => 'PDF',
                'ukuran' => '2.8 MB',
                'url' => '#',
            ],
            [
                'judul' => 'Peraturan Daerah tentang Penyelenggaraan Keterbukaan Informasi Publik',
                'keterangan' => 'Regulasi daerah yang mendasari pembentukan dan kewenangan PPID daerah.',
                'kategori' => 'Peraturan Daerah',
                'tahun' => '2023',
                'format' => 'PDF',
                'ukuran' => '1.5 MB',
                'url' => '#',
            ],
            [
                'judul' => 'Standar Operasional Prosedur (SOP) Pengelolaan Permohonan Informasi Publik',
                'keterangan' => 'Alur dan tata cara penanganan permohonan informasi publik dari awal hingga respon.',
                'kategori' => 'SOP Teknis',
                'tahun' => '2025',
                'format' => 'PDF',
                'ukuran' => '920 KB',
                'url' => '#',
            ],
            [
                'judul' => 'Ringkasan Laporan Keuangan Pemerintah Daerah (Audited) TA 2025',
                'keterangan' => 'Neraca dan laporan realisasi anggaran yang telah diaudit oleh BPK.',
                'kategori' => 'Keuangan',
                'tahun' => '2025',
                'format' => 'PDF',
                'ukuran' => '3.1 MB',
                'url' => '#',
            ],
        ];
    }

    /**
     * Dapatkan galeri foto dokumentasi instansi.
     */
    public function getGaleri(): array
    {
        return [
            [
                'judul' => 'Sosialisasi Keterbukaan Informasi Publik bagi Pelajar & Mahasiswa',
                'tanggal' => '05 Oktober 2026',
                'kategori' => 'Edukasi',
            ],
            [
                'judul' => 'Pelatihan Digitalisasi Arsip dan Dokumentasi Pejabat PPID Pelaksana',
                'tanggal' => '29 September 2026',
                'kategori' => 'Pelatihan',
            ],
            [
                'judul' => 'Kunjungan Kerja Tim Komisi Informasi Daerah dalam Rangka Monev',
                'tanggal' => '18 September 2026',
                'kategori' => 'Monev',
            ],
            [
                'judul' => 'Pemberian Layanan Tatap Muka di Meja Informasi Kantor Sekretariat',
                'tanggal' => '10 September 2026',
                'kategori' => 'Pelayanan',
            ],
            [
                'judul' => 'Rapat Pleno Penyusunan Daftar Informasi Publik Semester II Tahun 2026',
                'tanggal' => '02 September 2026',
                'kategori' => 'Rapat Kerja',
            ],
            [
                'judul' => 'Penyerahan Penghargaan Badan Publik Informatif Tingkat Provinsi',
                'tanggal' => '25 Agustus 2026',
                'kategori' => 'Seremoni',
            ],
        ];
    }
}
