@extends('layouts.app')

@section('title', 'Publikasi & Dokumen Resmi')

@section('content')
<div class="space-y-8">
    <!-- Header Halaman Publikasi -->
    <div class="border-b border-slate-200 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
                Pusat Unduhan
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
                Publikasi & Dokumen Resmi
            </h1>
            <p class="text-sm text-slate-600 mt-1">
                Katalog dokumen perencanaan, laporan akuntabilitas kinerja, peraturan daerah, dan ringkasan keuangan daerah.
            </p>
        </div>
    </div>

    <!-- Filter Kategori Dokumen -->
    <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 pb-4">
        <a href="{{ route('publikasi') }}" 
           class="px-3.5 py-1.5 rounded-lg text-xs font-semibold {{ empty($kategori) ? 'bg-blue-900 text-white shadow-xs' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }} transition-colors">
            Semua Dokumen
        </a>
        @foreach($kategoriList as $kat)
            <a href="{{ route('publikasi', ['kategori' => $kat]) }}" 
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold {{ (strtolower($kategori ?? '') === strtolower($kat)) ? 'bg-blue-900 text-white shadow-xs' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }} transition-colors">
                {{ $kat }}
            </a>
        @endforeach
    </div>

    <!-- Tabel Dokumen Menggunakan Komponen Reusable x-document-table -->
    <div>
        <x-document-table :documents="$daftarDokumen" caption="Daftar Dokumen Publik dan Publikasi Resmi" />
    </div>

    <!-- Paginasi -->
    <x-pagination :currentPage="1" :totalPages="1" baseUrl="{{ route('publikasi') }}" />
</div>
@endsection
