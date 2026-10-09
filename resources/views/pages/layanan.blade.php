@extends('layouts.app')

@section('title', 'Standar Pelayanan Publik')

@section('content')
<div class="space-y-10">
    <!-- Header Halaman Layanan -->
    <div class="border-b border-slate-200 pb-6">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
            Standar Pelayanan
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
            Layanan Publik & Maklumat Prosedur
        </h1>
        <p class="text-sm text-slate-600 mt-1 max-w-3xl leading-relaxed">
            Informasi lengkap standar operasional pelayanan, persyaratan dokumen, mekanisme alur pengajuan, rincian biaya resmi, serta estimasi waktu penyelesaian.
        </p>
    </div>

    <!-- Maklumat Standar Pelayanan -->
    <div class="p-6 rounded-2xl bg-gradient-to-r from-blue-900 to-slate-900 text-white shadow-md">
        <div class="flex items-start gap-4">
            <span class="text-3xl select-none" aria-hidden="true">📜</span>
            <div>
                <h2 class="text-base font-bold text-amber-300">Maklumat Standar Pelayanan Publik</h2>
                <p class="text-xs sm:text-sm text-slate-200 mt-1 leading-relaxed">
                    "Dengan ini kami menyatakan sanggup menyelenggarakan pelayanan publik sesuai standar pelayanan yang telah ditetapkan dan siap menerima sanksi sesuai peraturan perundang-undangan apabila tidak menepati janji layanan."
                </p>
            </div>
        </div>
    </div>

    <!-- Daftar Layanan Publik -->
    <div class="space-y-8">
        @foreach($layananList as $layanan)
            <article id="{{ $layanan['id'] }}" class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm">
                <header class="border-b border-slate-100 pb-4 mb-6">
                    <span class="text-xs font-bold text-blue-800 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                        Layanan Resmi Instansi
                    </span>
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 mt-2">
                        {{ $layanan['nama'] }}
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1">
                        {{ $layanan['deskripsi'] }}
                    </p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Persyaratan -->
                    <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2 mb-3">
                            <span>📋</span> Persyaratan Dokumen
                        </h3>
                        <ul class="space-y-2 text-xs text-slate-700 list-disc list-inside leading-relaxed">
                            @foreach($layanan['persyaratan'] as $syarat)
                                <li>{{ $syarat }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Alur & Prosedur -->
                    <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2 mb-3">
                            <span>🔄</span> Alur & Mekanisme Pengajuan
                        </h3>
                        <p class="text-xs text-slate-700 leading-relaxed font-mono bg-white p-3 rounded-lg border border-slate-200">
                            {{ $layanan['alur'] }}
                        </p>
                    </div>

                    <!-- Biaya & Tarif -->
                    <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50/40">
                        <span class="text-[11px] font-bold uppercase text-emerald-800 block">Biaya / Tarif:</span>
                        <strong class="text-sm font-bold text-emerald-950 block mt-0.5">{{ $layanan['biaya'] }}</strong>
                    </div>

                    <!-- Waktu Penyelesaian -->
                    <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/40">
                        <span class="text-[11px] font-bold uppercase text-blue-800 block">Waktu Penyelesaian:</span>
                        <strong class="text-sm font-bold text-blue-950 block mt-0.5">{{ $layanan['waktu'] }}</strong>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                    <span class="text-xs text-slate-500">Dasar Hukum: UU No. 14/2008 & UU No. 25/2009 tentang Pelayanan Publik</span>
                    @if($layanan['id'] === 'permohonan-informasi')
                        <a href="{{ route('home') }}#ppid" class="btn btn-red text-xs">
                            Isi Formulir Permohonan &rarr;
                        </a>
                    @elseif($layanan['id'] === 'keberatan-informasi')
                        <a href="{{ route('home') }}#ppid" class="btn btn-outline text-xs">
                            Isi Formulir Keberatan &rarr;
                        </a>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</div>
@endsection
