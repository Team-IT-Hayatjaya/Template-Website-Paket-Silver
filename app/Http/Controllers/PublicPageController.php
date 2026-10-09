<?php

namespace App\Http\Controllers;

use App\Services\ContentDataService;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function __construct(
        protected ContentDataService $contentService
    ) {}

    /**
     * Halaman Beranda Publik.
     */
    public function home()
    {
        $beritaTerbaru = $this->contentService->getBerita(3);
        $pengumuman = $this->contentService->getBerita(2, 'Pengumuman');
        $agenda = $this->contentService->getAgenda();

        return view('pages.home', compact('beritaTerbaru', 'pengumuman', 'agenda'));
    }

    /**
     * Halaman Profil Instansi & PPID.
     */
    public function profil()
    {
        $pejabat = $this->contentService->getPejabat();

        return view('pages.profil', compact('pejabat'));
    }

    /**
     * Halaman Daftar Berita & Artikel.
     */
    public function berita(Request $request)
    {
        $kategori = $request->query('kategori');
        $q = $request->query('q');

        $daftarBerita = $this->contentService->getBerita(12, $kategori);

        if ($q) {
            $daftarBerita = array_filter($daftarBerita, function ($item) use ($q) {
                return stripos($item['judul'], $q) !== false || stripos($item['ringkasan'], $q) !== false;
            });
        }

        $kategoriList = ['Keterbukaan Informasi', 'Kegiatan', 'Pengumuman', 'Prestasi'];

        return view('pages.berita.index', compact('daftarBerita', 'kategoriList', 'kategori', 'q'));
    }

    /**
     * Halaman Detail Baca Berita.
     */
    public function detailBerita(string $slug)
    {
        $berita = $this->contentService->findBeritaBySlug($slug);

        if (!$berita) {
            abort(404, 'Berita atau artikel yang Anda cari tidak ditemukan.');
        }

        $beritaTerkait = array_slice($this->contentService->getBerita(3), 0, 3);

        return view('pages.berita.detail', compact('berita', 'beritaTerkait'));
    }

    /**
     * Halaman Galeri Dokumentasi Foto Kegiatan.
     */
    public function galeri()
    {
        $galeri = $this->contentService->getGaleri();

        return view('pages.galeri', compact('galeri'));
    }

    /**
     * Halaman Daftar Layanan Publik.
     */
    public function layanan()
    {
        $layananList = $this->contentService->getLayanan();

        return view('pages.layanan', compact('layananList'));
    }

    /**
     * Halaman Publikasi dan Dokumen Resmi.
     */
    public function publikasi(Request $request)
    {
        $kategori = $request->query('kategori');
        $daftarDokumen = $this->contentService->getPublikasi();

        if ($kategori) {
            $daftarDokumen = array_filter($daftarDokumen, fn($doc) => strtolower($doc['kategori']) === strtolower($kategori));
        }

        $kategoriList = ['Rencana Strategis', 'Perencanaan', 'Laporan Kinerja', 'Peraturan Daerah', 'SOP Teknis', 'Keuangan'];

        return view('pages.publikasi', compact('daftarDokumen', 'kategoriList', 'kategori'));
    }

    /**
     * Halaman Kontak & Pengaduan (dengan Leaflet Map).
     */
    public function kontak()
    {
        return view('pages.kontak');
    }

    /**
     * Kirim Pengaduan / Pesan Masyarakat.
     */
    public function kirimPengaduan(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'topik' => ['required', 'string', 'max:255'],
            'pesan' => ['required', 'string', 'max:2000'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'topik.required' => 'Subjek atau topik pesan wajib dipilih.',
            'pesan.required' => 'Uraian pengaduan atau pesan wajib diisi.',
        ]);

        // Pada paket Silver, pengaduan dicatat dan direspon melalui email/kontak
        return redirect()->route('kontak')
            ->with('success', 'Terima kasih, pesan atau aspirasi Anda telah berhasil dikirimkan. Petugas kami akan menindaklanjuti melalui email atau nomor kontak Anda.');
    }

    /**
     * Halaman Showcase Komponen UI Standar (Paket Silver).
     */
    public function komponen()
    {
        return view('pages.komponen');
    }
}
