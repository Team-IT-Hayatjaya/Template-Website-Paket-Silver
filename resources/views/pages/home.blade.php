@extends('layouts.app')

@section('title', 'Beranda - Portal Resmi Instansi Pemerintah')

@section('content')
    <!-- Hero Banner -->
    <section class="gov-hero">
        <span class="gov-hero-badge">Keterbukaan Informasi Publik</span>
        <h2>Selamat Datang di Portal Resmi & Layanan PPID</h2>
        <p>
            Mewujudkan tata kelola pemerintahan yang transparan, akuntabel, dan berorientasi pada pelayanan masyarakat sesuai amanat Undang-Undang Republik Indonesia Nomor 14 Tahun 2008.
        </p>
        <div class="gov-hero-actions">
            <a href="#ppid" class="btn btn-red" id="hero-btn-permohonan">
                📄 Layanan Informasi PPID
            </a>
            <a href="{{ route('profil') }}" class="btn btn-outline-white" id="hero-btn-profil">
                🏛️ Profil Instansi
            </a>
        </div>
    </section>

    <!-- Info Regulasi UU No. 14 Tahun 2008 -->
    <div class="gov-info-box">
        <h4>Dasar Hukum Keterbukaan Informasi Publik</h4>
        <p>
            Setiap warga negara berhak memperoleh informasi publik sesuai dengan ketentuan peraturan perundang-undangan (Undang-Undang Nomor 14 Tahun 2008). Pejabat Pengelola Informasi dan Dokumentasi (PPID) berkewajiban melayani permohonan informasi secara cepat, tepat waktu, dan biaya ringan.
        </p>
    </div>

    <!-- Modul Layanan PPID Utama (Cakupan Silver) -->
    <section id="ppid" style="margin-bottom: 3rem;">
        <div style="margin-bottom: 1.5rem;">
            <h2 style="font-size: 1.6rem; color: var(--gov-primary-dark); font-weight: 700;">Layanan Informasi Publik (PPID)</h2>
            <p style="color: var(--gov-text-muted);">Pilih menu layanan informasi publik yang Anda butuhkan di bawah ini.</p>
        </div>

        <div class="grid-cols-3">
            <!-- Kartu 1: Daftar Informasi Publik (DIP) -->
            <div class="gov-card">
                <div class="gov-card-icon">📚</div>
                <h3>Daftar Informasi Publik (DIP)</h3>
                <p>Akses katalog dokumen publik yang telah diklasifikasikan secara berkala, serta-merta, dan setiap saat sesuai standar PPID.</p>
                <a href="#dip" class="btn btn-primary" style="width: 100%;" id="btn-lihat-dip">
                    Lihat Daftar Informasi &rarr;
                </a>
            </div>

            <!-- Kartu 2: Formulir Permohonan Informasi -->
            <div class="gov-card">
                <div class="gov-card-icon">📝</div>
                <h3>Permohonan Informasi</h3>
                <p>Isi formulir permohonan informasi publik resmi apabila dokumen yang Anda perlukan belum tersedia dalam katalog publik.</p>
                <a href="#permohonan" class="btn btn-red" style="width: 100%;" id="btn-isi-permohonan">
                    Ajukan Permohonan &rarr;
                </a>
            </div>

            <!-- Kartu 3: Pengajuan Keberatan -->
            <div class="gov-card">
                <div class="gov-card-icon">⚖️</div>
                <h3>Pengajuan Keberatan</h3>
                <p>Layanan keberatan atas permohonan informasi yang tidak ditanggapi, ditolak sebagian/seluruhnya, atau tidak sesuai ketentuan.</p>
                <a href="#keberatan" class="btn btn-light" style="width: 100%;" id="btn-ajukan-keberatan">
                    Ajukan Keberatan &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- Sekilas Profil & Maklumat Pelayanan -->
    <section style="margin-bottom: 3rem;">
        <div style="background-color: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 2rem; box-shadow: var(--gov-shadow);">
            <h3 style="font-size: 1.4rem; color: var(--gov-primary-dark); margin-bottom: 0.75rem;">Maklumat Pelayanan Informasi Publik</h3>
            <p style="color: var(--gov-text-dark); margin-bottom: 1rem; font-style: italic;">
                "Kami berkomitmen memberikan pelayanan informasi publik dengan sungguh-sungguh, transparan, cepat, tepat waktu, dan tanpa diskriminasi demi terwujudnya keterbukaan informasi di lingkungan instansi kami."
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 260px; background: #f8fafc; padding: 1.25rem; border-radius: 8px;">
                    <strong style="color: var(--gov-primary);">Waktu Pelayanan Meja PPID:</strong>
                    <ul style="margin-top: 0.5rem; padding-left: 1.2rem; color: var(--gov-text-muted); font-size: 0.9rem;">
                        <li>Senin s.d. Kamis: 08.00 - 15.30 WIB</li>
                        <li>Jumat: 08.00 - 15.00 WIB</li>
                        <li>Istirahat: 12.00 - 13.00 WIB</li>
                    </ul>
                </div>
                <div style="flex: 1; min-width: 260px; background: #f8fafc; padding: 1.25rem; border-radius: 8px;">
                    <strong style="color: var(--gov-primary);">Biaya / Tarif:</strong>
                    <p style="margin-top: 0.5rem; color: var(--gov-text-muted); font-size: 0.9rem;">
                        Penyediaan layanan informasi publik tidak dipungut biaya (Gratis). Penggandaan dokumen fisik (fotokopi) atau media rekam mandiri ditanggung oleh pemohon informasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita & Pengumuman Instansi -->
    <section id="berita" style="margin-bottom: 3rem;">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.5rem;">
            <div>
                <h2 style="font-size: 1.6rem; color: var(--gov-primary-dark); font-weight: 700;">Berita & Pengumuman Terkini</h2>
                <p style="color: var(--gov-text-muted);">Informasi dan kabar terbaru seputar kegiatan instansi dan pelayanan publik.</p>
            </div>
        </div>

        <div class="grid-cols-3">
            <article class="gov-card">
                <div style="font-size: 0.8rem; color: var(--gov-red); font-weight: 700; text-transform: uppercase; margin-bottom: 0.4rem;">Pengumuman</div>
                <h3 style="font-size: 1.15rem;">Pemutakhiran Daftar Informasi Publik Tahun 2026</h3>
                <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) telah memutakhirkan ringkasan informasi berkala dan setiap saat untuk periode semester berjalan.</p>
                <span style="font-size: 0.8rem; color: #94a3b8;">📅 9 Oktober 2026 &bull; Oleh Administrator</span>
            </article>

            <article class="gov-card">
                <div style="font-size: 0.8rem; color: var(--gov-primary); font-weight: 700; text-transform: uppercase; margin-bottom: 0.4rem;">Kegiatan</div>
                <h3 style="font-size: 1.15rem;">Sosialisasi Hak Masyarakat atas Keterbukaan Informasi</h3>
                <p>Penyelenggaraan sosialisasi keterbukaan informasi publik guna meningkatkan partisipasi masyarakat dalam pengawasan pembangunan daerah.</p>
                <span style="font-size: 0.8rem; color: #94a3b8;">📅 7 Oktober 2026 &bull; Oleh Humas</span>
            </article>

            <article class="gov-card">
                <div style="font-size: 0.8rem; color: var(--gov-gold); font-weight: 700; text-transform: uppercase; margin-bottom: 0.4rem;">Layanan</div>
                <h3 style="font-size: 1.15rem;">Optimalisasi Meja Pelayanan Informasi Publik</h3>
                <p>Peningkatan sarana dan fasilitas meja pelayanan langsung PPID bagi masyarakat yang membutuhkan konsultasi dokumen secara luring.</p>
                <span style="font-size: 0.8rem; color: #94a3b8;">📅 4 Oktober 2026 &bull; Oleh PPID Utama</span>
            </article>
        </div>
    </section>
@endsection
