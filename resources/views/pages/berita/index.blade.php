@extends('layouts.app')

@section('title', 'Arsip Berita & Pengumuman Resmi')

@section('content')
<div class="space-y-8">
    <!-- Header Halaman Berita -->
    <div class="border-b border-slate-200 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
                Pusat Informasi
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
                Berita & Siaran Pers Resmi
            </h1>
            <p class="text-sm text-slate-600 mt-1">
                Kumpulan rilis berita, pengumuman kedinasan, serta liputan kegiatan instansi terkini.
            </p>
        </div>

        <!-- Formulir Pencarian Berita -->
        <form action="{{ route('berita.index') }}" method="GET" class="w-full md:w-80 relative" role="search">
            <label for="search-news" class="sr-only">Cari judul berita</label>
            <input type="search" 
                   id="search-news" 
                   name="q" 
                   value="{{ $q ?? '' }}" 
                   placeholder="Cari topik berita..." 
                   class="w-full pl-9 pr-4 py-2 text-sm rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 shadow-xs">
            <span class="absolute left-3 top-2.5 text-slate-400 text-sm" aria-hidden="true">🔍</span>
        </form>
    </div>

    <!-- Filter Tab Kategori -->
    <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 pb-4">
        <a href="{{ route('berita.index') }}" 
           class="px-3.5 py-1.5 rounded-lg text-xs font-semibold {{ empty($kategori) ? 'bg-blue-900 text-white shadow-xs' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }} transition-colors">
            Semua Berita
        </a>
        @foreach($kategoriList as $kat)
            <a href="{{ route('berita.index', ['kategori' => $kat]) }}" 
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold {{ (strtolower($kategori ?? '') === strtolower($kat)) ? 'bg-blue-900 text-white shadow-xs' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }} transition-colors">
                {{ $kat }}
            </a>
        @endforeach
    </div>

    <!-- Grid Berita -->
    @if(count($daftarBerita) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($daftarBerita as $item)
                <x-news-card 
                    :title="$item['judul']"
                    :date="$item['tanggal']"
                    :category="$item['kategori']"
                    :excerpt="$item['ringkasan']"
                    :url="route('berita.detail', $item['slug'])" />
            @endforeach
        </div>

        <!-- Paginasi -->
        <x-pagination :currentPage="1" :totalPages="1" baseUrl="{{ route('berita.index') }}" />
    @else
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
            <span class="text-4xl mb-3 block" aria-hidden="true">🔍</span>
            <h3 class="text-base font-bold text-slate-900 mb-1">Berita Tidak Ditemukan</h3>
            <p class="text-xs text-slate-500 max-w-md mx-auto mb-4">
                Tidak ada berita yang cocok dengan kata kunci "{{ $q ?? '' }}" atau kategori yang dipilih.
            </p>
            <a href="{{ route('berita.index') }}" class="btn btn-outline text-xs">
                Reset Pencarian & Kategori
            </a>
        </div>
    @endif
</div>
@endsection
