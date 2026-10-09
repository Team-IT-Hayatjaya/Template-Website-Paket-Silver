@extends('layouts.app')

@section('title', $berita['judul'] . ' - Portal Resmi')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <!-- Breadcrumb / Tombol Kembali -->
    <nav aria-label="Navigasi Jejak Rekam" class="text-xs text-slate-500">
        <ol class="flex items-center gap-2">
            <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
            <li aria-hidden="true">&rsaquo;</li>
            <li><a href="{{ route('berita.index') }}" class="hover:underline">Berita</a></li>
            <li aria-hidden="true">&rsaquo;</li>
            <li class="font-semibold text-slate-800 truncate max-w-xs">{{ $berita['judul'] }}</li>
        </ol>
    </nav>

    <!-- Artikel Utama -->
    <article class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-10 shadow-sm">
        <header class="mb-6 pb-6 border-b border-slate-100">
            <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold text-white mb-3"
                  style="background-color: var(--gov-primary, #1e3a8a);">
                {{ $berita['kategori'] }}
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                {{ $berita['judul'] }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 mt-4">
                <span class="flex items-center gap-1.5 font-medium">
                    <span>📅</span> {{ $berita['tanggal'] }}
                </span>
                <span class="flex items-center gap-1.5 font-medium">
                    <span>✍️</span> Oleh: {{ $berita['penulis'] }}
                </span>
            </div>
        </header>

        <!-- Ringkasan / Lead Paragraph -->
        <p class="text-base sm:text-lg font-medium text-slate-700 leading-relaxed italic mb-6 p-4 bg-slate-50 rounded-xl border-l-4 border-blue-900">
            {{ $berita['ringkasan'] }}
        </p>

        <!-- Isi Artikel Lengkap -->
        <div class="prose prose-slate max-w-none text-slate-800 leading-relaxed space-y-4 text-sm sm:text-base">
            <p>
                {{ $berita['isi'] }}
            </p>
            <p>
                Pemerintah daerah mengimbau seluruh elemen masyarakat untuk terus memanfaatkan sarana komunikasi resmi ini. Transparansi dan kemudahan akses informasi publik merupakan komitmen berkelanjutan dalam menciptakan birokrasi yang melayani dan tepercaya.
            </p>
        </div>

        <footer class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
            <a href="{{ route('berita.index') }}" class="btn btn-light text-xs">
                &larr; Kembali ke Daftar Berita
            </a>
            <span class="text-xs text-slate-400">Portal Resmi Pemerintah Daerah &bull; Paket Silver</span>
        </footer>
    </article>

    <!-- Berita Terkait -->
    @if(!empty($beritaTerkait))
        <section class="mt-10" aria-labelledby="heading-terkait">
            <h2 id="heading-terkait" class="text-lg font-bold text-slate-900 mb-4">
                Berita dan Informasi Terkait
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach($beritaTerkait as $rel)
                    @if($rel['slug'] !== $berita['slug'])
                        <div class="p-4 bg-white rounded-xl border border-slate-200 shadow-2xs hover:shadow-sm transition-all flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-blue-700 block mb-1">{{ $rel['tanggal'] }}</span>
                                <h3 class="text-xs font-bold text-slate-900 line-clamp-2 hover:text-blue-900">
                                    <a href="{{ route('berita.detail', $rel['slug']) }}">{{ $rel['judul'] }}</a>
                                </h3>
                            </div>
                            <a href="{{ route('berita.detail', $rel['slug']) }}" class="text-[11px] font-semibold text-blue-800 hover:underline mt-3">
                                Baca artikel &rarr;
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection
