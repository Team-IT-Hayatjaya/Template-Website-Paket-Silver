@extends('layouts.app')

@section('title', 'Beranda - Portal Resmi Instansi Pemerintah')

@section('content')
<div class="space-y-12">
    <!-- Hero Banner Utama -->
    <section class="gov-hero">
        <span class="gov-hero-badge">Keterbukaan Informasi Publik</span>
        <h2>Selamat Datang di Portal Resmi & Layanan PPID</h2>
        <p>
            Mewujudkan tata kelola pemerintahan yang transparan, akuntabel, dan berorientasi pada pelayanan prima kepada masyarakat sesuai amanat Undang-Undang RI Nomor 14 Tahun 2008.
        </p>
        <div class="gov-hero-actions">
            <a href="#ppid" class="btn btn-red" id="hero-btn-permohonan">
                📋 Layanan Informasi PPID
            </a>
            <a href="{{ route('layanan') }}" class="btn btn-light" id="hero-btn-layanan">
                🛠️ Layanan Publik
            </a>
            <a href="{{ route('profil') }}" class="btn btn-outline-white" id="hero-btn-profil">
                🏛️ Profil Instansi
            </a>
        </div>
    </section>

    <!-- Sambutan Pimpinan Instansi -->
    <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
            <div class="shrink-0 text-center">
                <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl bg-gradient-to-br from-blue-900 to-slate-800 text-white flex flex-col items-center justify-center shadow-md border-4 border-slate-100">
                    <span class="text-4xl select-none" aria-hidden="true">👤</span>
                    <span class="text-xs mt-1 font-semibold text-amber-300">Kepala Dinas</span>
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
                    Sambutan Pimpinan
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mt-2 mb-3">
                    "Keterbukaan Informasi adalah Kunci Partisipasi Masyarakat"
                </h3>
                <blockquote class="text-sm text-slate-600 leading-relaxed italic border-l-0 md:border-l-4 md:border-amber-500 md:pl-4 mb-4">
                    "Selamat datang di portal resmi kami. Melalui penyediaan sarana keterbukaan informasi publik dan layanan berbasis digital ini, kami berikhtiar menghadirkan akses data yang akuntabel, terpercaya, serta mudah dijangkau oleh segenap warga masyarakat."
                </blockquote>
                <div>
                    <h4 class="text-sm font-bold text-slate-900">Dr. H. Raden Santoso, M.Si.</h4>
                    <p class="text-xs text-slate-500">Kepala Dinas / Atasan PPID Utama</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pintasan Layanan Cepat -->
    <section id="layanan-cepat">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-900">Pintasan Layanan Unggulan</h2>
                <p class="text-xs sm:text-sm text-slate-500">Akses cepat pelayanan publik dan keterbukaan informasi.</p>
            </div>
            <a href="{{ route('layanan') }}" class="text-xs sm:text-sm font-semibold text-blue-800 hover:text-blue-950">
                Semua Layanan &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="#ppid" class="p-5 rounded-xl border border-slate-200 bg-white hover:border-blue-500 hover:shadow-md transition-all group">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center text-xl mb-3 group-hover:scale-110 transition-transform">
                    📋
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Permohonan Informasi</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Pengajuan permohonan dokumen publik secara online.</p>
            </a>

            <a href="{{ route('publikasi') }}" class="p-5 rounded-xl border border-slate-200 bg-white hover:border-blue-500 hover:shadow-md transition-all group">
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-xl mb-3 group-hover:scale-110 transition-transform">
                    📚
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Katalog Dokumen (DIP)</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Unduh dokumen berkala dan laporan resmi.</p>
            </a>

            <a href="#ppid" class="p-5 rounded-xl border border-slate-200 bg-white hover:border-red-500 hover:shadow-md transition-all group">
                <div class="w-10 h-10 rounded-lg bg-red-50 text-red-700 flex items-center justify-center text-xl mb-3 group-hover:scale-110 transition-transform">
                    ⚖️
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Pengajuan Keberatan</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Penyampaian keberatan atas respon informasi.</p>
            </a>

            <a href="{{ route('kontak') }}" class="p-5 rounded-xl border border-slate-200 bg-white hover:border-blue-500 hover:shadow-md transition-all group">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl mb-3 group-hover:scale-110 transition-transform">
                    💬
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Kontak & Pengaduan</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Saluran aspirasi dan konsultasi tatap muka.</p>
            </a>
        </div>
    </section>

    <!-- Berita Terkini & Agenda Kegiatan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- 2 Kolom: Berita Terbaru -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Kabar & Berita Terkini</h2>
                    <p class="text-xs sm:text-sm text-slate-500">Informasi kegiatan dan kebijakan instansi.</p>
                </div>
                <a href="{{ route('berita.index') }}" class="text-xs sm:text-sm font-semibold text-blue-800 hover:text-blue-950">
                    Lihat Semua Berita &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($beritaTerbaru as $berita)
                    <x-news-card 
                        :title="$berita['judul']"
                        :date="$berita['tanggal']"
                        :category="$berita['kategori']"
                        :excerpt="$berita['ringkasan']"
                        :url="route('berita.detail', $berita['slug'])" />
                @endforeach
            </div>
        </div>

        <!-- 1 Kolom: Agenda Kegiatan & Pengumuman -->
        <div class="space-y-6">
            <!-- Agenda Kegiatan -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-100">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span>📅</span> Agenda Kegiatan
                    </h3>
                </div>

                <div class="space-y-4">
                    @foreach($agenda as $item)
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition-colors">
                            <div class="flex items-center justify-between text-xs font-semibold text-blue-700 mb-1">
                                <span>{{ $item['tanggal'] }}</span>
                                <span class="bg-blue-100 px-2 py-0.5 rounded text-[11px]">{{ $item['waktu'] }}</span>
                            </div>
                            <h4 class="text-xs font-bold text-slate-900 leading-snug mb-1">
                                {{ $item['acara'] }}
                            </h4>
                            <p class="text-[11px] text-slate-500 flex items-center gap-1">
                                <span>📍</span> {{ $item['lokasi'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pengumuman Singkat -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-100">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span>📢</span> Pengumuman
                    </h3>
                </div>

                <div class="space-y-3">
                    @foreach($pengumuman as $peng)
                        <div class="border-l-2 border-red-600 pl-3 py-1">
                            <span class="text-[10px] text-slate-400 font-semibold block">{{ $peng['tanggal'] }}</span>
                            <a href="{{ route('berita.detail', $peng['slug']) }}" class="text-xs font-bold text-slate-900 hover:text-blue-700 leading-snug block">
                                {{ $peng['judul'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modul Layanan PPID Utama -->
    <section id="ppid" class="bg-gradient-to-br from-slate-900 to-blue-950 rounded-2xl p-6 sm:p-10 text-white shadow-lg">
        <div class="max-w-3xl mb-8">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">UU No. 14 Tahun 2008</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-1 mb-3">Layanan Informasi Publik (PPID)</h2>
            <p class="text-sm text-slate-300 leading-relaxed">
                Pilih menu layanan di bawah ini untuk mengakses katalog informasi publik, mengajukan permohonan baru, atau menyampaikan keberatan secara resmi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl p-6 flex flex-col justify-between hover:bg-white/15 transition-colors">
                <div>
                    <div class="text-3xl mb-3">📚</div>
                    <h3 class="text-base font-bold text-white mb-2">Daftar Informasi Publik (DIP)</h3>
                    <p class="text-xs text-slate-300 leading-relaxed mb-4">
                        Katalog dokumen yang wajib diumumkan secara berkala, serta-merta, dan setiap saat.
                    </p>
                </div>
                <a href="{{ route('publikasi') }}" class="btn btn-light" style="width: 100%; font-size: 0.85rem;">
                    Buka Katalog DIP &rarr;
                </a>
            </div>

            <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl p-6 flex flex-col justify-between hover:bg-white/15 transition-colors">
                <div>
                    <div class="text-3xl mb-3">📝</div>
                    <h3 class="text-base font-bold text-white mb-2">Permohonan Informasi</h3>
                    <p class="text-xs text-slate-300 leading-relaxed mb-4">
                        Ajukan permohonan resmi apabila dokumen yang Anda perlukan belum tersedia di katalog.
                    </p>
                </div>
                <a href="{{ route('layanan') }}#permohonan-informasi" class="btn btn-red" style="width: 100%; font-size: 0.85rem;">
                    Ajukan Permohonan &rarr;
                </a>
            </div>

            <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl p-6 flex flex-col justify-between hover:bg-white/15 transition-colors">
                <div>
                    <div class="text-3xl mb-3">⚖️</div>
                    <h3 class="text-base font-bold text-white mb-2">Pengajuan Keberatan</h3>
                    <p class="text-xs text-slate-300 leading-relaxed mb-4">
                        Penyampaian keberatan apabila permohonan Anda tidak ditanggapi atau ditolak.
                    </p>
                </div>
                <a href="{{ route('layanan') }}#keberatan-informasi" class="btn btn-outline-white" style="width: 100%; font-size: 0.85rem;">
                    Ajukan Keberatan &rarr;
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
