<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - {{ $pengaturan->nama_instansi ?? config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', 'Portal Resmi Instansi Pemerintah Republik Indonesia - Layanan Publik dan Keterbukaan Informasi Publik (PPID) sesuai UU No. 14 Tahun 2008.')">
    
    <!-- CSS Sistem Desain Instansi -->
    <link rel="stylesheet" href="{{ asset('css/instansi.css') }}">
    
    <!-- Injeksi Tema Dinamis (Variabel Warna & Favicon) -->
    <x-theme-styles />
    
    @stack('styles')
</head>
<body>

    <!-- Topbar Resmi -->
    <div class="gov-topbar">
        <div class="gov-topbar-content">
            <div>
                <span>🇮🇩 Portal Resmi {{ $pengaturan->nama_instansi ?? 'Pemerintah Daerah' }}</span>
                <span style="margin: 0 8px; opacity: 0.5;">|</span>
                <span>Standar Keterbukaan Informasi UU No. 14/2008</span>
            </div>
            <div>
                <span>Pelayanan: {{ $pengaturan->jam_layanan ? Str::limit($pengaturan->jam_layanan, 45) : 'Senin - Jumat (08.00 - 15.30 WIB)' }}</span>
            </div>
        </div>
    </div>

    <!-- Header Instansi -->
    <header class="gov-header">
        <div class="gov-header-inner">
            <a href="{{ route('home') }}" class="gov-brand" id="brand-link">
                <x-logo />
                <div class="gov-brand-text">
                    <h1>{{ $pengaturan->nama_instansi ?? 'PEMERINTAH KABUPATEN / KOTA' }}</h1>
                    <p>{{ $pengaturan->sub_nama_instansi ?? 'DINAS KOMUNIKASI DAN INFORMATIKA' }} &bull; {{ $pengaturan->nama_ppid ?? 'PPID UTAMA' }}</p>
                </div>
            </a>
            <div>
                <a href="{{ route('admin.login') }}" class="btn btn-light" style="font-size: 0.85rem; padding: 0.4rem 0.8rem;" id="nav-admin-login">
                    🔒 Masuk Admin
                </a>
            </div>
        </div>
    </header>

    <!-- Navigasi Utama -->
    <nav class="gov-nav-wrap">
        <div class="gov-nav">
            <ul class="gov-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" id="nav-beranda">Beranda</a></li>
                <li><a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}" id="nav-profil">Profil Instansi</a></li>
                <li><a href="{{ route('home') }}#layanan" id="nav-layanan">Layanan Publik</a></li>
                <li><a href="{{ route('home') }}#berita" id="nav-berita">Berita & Pengumuman</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}" id="nav-kontak">Kontak Kami</a></li>
            </ul>
            <div>
                <a href="{{ route('home') }}#ppid" class="btn btn-red gov-btn-ppid" id="nav-ppid-action">
                    📋 Layanan PPID
                </a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="gov-container">
        @if(session('success'))
            <div class="alert alert-success" role="alert" id="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert" id="alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info" role="alert" id="alert-info">
                {{ session('info') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer Resmi -->
    <footer class="gov-footer">
        <div class="gov-footer-inner">
            <div>
                <h4>{{ $pengaturan->sub_nama_instansi ?? 'DINAS KOMUNIKASI & INFORMATIKA' }}</h4>
                <p>{{ $pengaturan->nama_ppid ?? 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) Utama' }}.</p>
                <p style="margin-top: 0.5rem; white-space: pre-line;">
                    {{ $pengaturan->alamat ?? 'Gedung Sekretariat Daerah Lt. 2, Jl. Pahlawan No. 45' }}
                    @if($pengaturan?->telepon)
                        <br>Telepon: {{ $pengaturan->telepon }}
                    @endif
                    @if($pengaturan?->email)
                        <br>Email: {{ $pengaturan->email }}
                    @endif
                </p>
            </div>
            <div>
                <h4>MENU PPID (UU NO. 14/2008)</h4>
                <ul>
                    <li><a href="{{ route('home') }}#ppid">&bull; Daftar Informasi Publik (DIP)</a></li>
                    <li><a href="{{ route('home') }}#ppid">&bull; Formulir Permohonan Informasi</a></li>
                    <li><a href="{{ route('home') }}#ppid">&bull; Pengajuan Keberatan Informasi</a></li>
                    <li><a href="{{ route('profil') }}">&bull; Visi, Misi & Maklumat Pelayanan</a></li>
                </ul>
            </div>
            <div>
                <h4>JAM LAYANAN PPID</h4>
                <p style="white-space: pre-line;">
                    {{ $pengaturan->jam_layanan ?? "Senin - Kamis: 08.00 - 15.30 WIB\nJumat: 08.00 - 15.00 WIB" }}
                </p>
                <p style="margin-top: 0.5rem;">
                    <small>Sabtu, Minggu, dan Hari Libur Nasional tutup.</small>
                </p>
            </div>
        </div>
        <div class="gov-footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $pengaturan->nama_instansi ?? 'Portal Resmi Pemerintah Daerah' }}. Hak Cipta Dilindungi Undang-Undang.</p>
            <p style="margin-top: 0.25rem;">Dikembangkan oleh <strong>PT Hayat Jaya Teknologi (HJT)</strong> &bull; Paket SILVER</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
