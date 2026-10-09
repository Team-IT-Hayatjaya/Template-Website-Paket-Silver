@extends('layouts.app')

@section('title', 'Galeri Foto Dokumentasi Kegiatan')

@section('content')
<div class="space-y-8">
    <!-- Header Halaman Galeri -->
    <div class="border-b border-slate-200 pb-6">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
            Dokumentasi Visual
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
            Galeri Kegiatan & Pelayanan Publik
        </h1>
        <p class="text-sm text-slate-600 mt-1 max-w-3xl">
            Dokumentasi visual rangkaian kegiatan kedinasan, sosialisasi keterbukaan informasi publik, pelatihan teknis, dan pelayanan masyarakat.
        </p>
    </div>

    <!-- Grid Foto Dokumentasi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @foreach($galeri as $item)
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow group flex flex-col">
                <div class="aspect-4/3 w-full bg-gradient-to-br from-slate-800 to-blue-950 flex flex-col items-center justify-center text-white relative p-6 text-center group-hover:scale-[1.02] transition-transform">
                    <span class="text-4xl mb-2 select-none" aria-hidden="true">📷</span>
                    <span class="text-xs text-slate-300 font-medium">Dokumentasi Foto</span>
                    <span class="absolute top-3 left-3 px-2 py-0.5 rounded text-[10px] font-bold text-white bg-blue-600">
                        {{ $item['kategori'] }}
                    </span>
                </div>
                <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-[11px] text-slate-400 font-medium block mb-1">📅 {{ $item['tanggal'] }}</span>
                        <h3 class="text-sm font-bold text-slate-900 leading-snug">
                            {{ $item['judul'] }}
                        </h3>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span>Humas Diskominfo</span>
                        <span class="text-blue-700 font-semibold">Tersimpan di Arsip</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
