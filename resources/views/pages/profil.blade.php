@extends('layouts.app')

@section('title', 'Profil Instansi & Struktur Organisasi')

@section('content')
<div class="space-y-10">
    <!-- Header Halaman Profil -->
    <div class="border-b border-slate-200 pb-6">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
            Tentang Kami
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
            Profil Instansi & Pejabat Pengelola Informasi (PPID)
        </h1>
        <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-3xl leading-relaxed">
            Mengenal sejarah pendirian, visi misi, tugas pokok dan fungsi kedinasan, struktur organisasi, serta jajaran pimpinan yang mengabdi bagi masyarakat.
        </p>
    </div>

    <!-- 1. Sejarah Singkat -->
    <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm" aria-labelledby="heading-sejarah">
        <h2 id="heading-sejarah" class="text-xl font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
            <span>📜</span> Sejarah Singkat Instansi
        </h2>
        <div class="prose prose-slate max-w-none text-sm text-slate-700 leading-relaxed space-y-3">
            <p>
                Dinas Komunikasi dan Informatika dibentuk berdasarkan Peraturan Daerah dalam rangka menjawab dinamika keterbukaan informasi dan percepatan transformasi tata kelola pemerintahan berbasis elektronik (SPBE). Sejak awal pendiriannya, instansi ini mengemban mandat sebagai garda terdepan diseminasi kebijakan pemerintah, pelayanan informasi publik, dan integrasi infrastruktur digital daerah.
            </p>
            <p>
                Dengan berlakunya Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, instansi ditetapkan sebagai Pejabat Pengelola Informasi dan Dokumentasi (PPID) Utama. Melalui peran ini, seluruh perangkat daerah dikoordinasikan untuk menjamin hak konstitusional setiap warga negara dalam memperoleh dokumen dan informasi yang akurat, benar, dan tidak menyesatkan.
            </p>
        </div>
    </section>

    <!-- 2. Visi dan Misi -->
    <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm" aria-labelledby="heading-visi-misi">
        <h2 id="heading-visi-misi" class="text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-100 flex items-center gap-2">
            <span>🎯</span> Visi & Misi
        </h2>
        
        <div class="mb-6">
            <h3 class="text-sm font-bold text-blue-900 uppercase tracking-wider mb-2">Visi</h3>
            <div class="p-4 bg-gradient-to-r from-blue-50 to-slate-50 border-l-4 border-blue-900 rounded-r-xl">
                <p class="text-base sm:text-lg font-bold text-slate-900 italic">
                    "Terwujudnya Tata Kelola Pemerintahan Daerah yang Terbuka, Transparan, Akuntabel, dan Memberikan Pelayanan Prima kepada Seluruh Lapisan Masyarakat."
                </p>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold text-blue-900 uppercase tracking-wider mb-2">Misi</h3>
            <ol class="space-y-2.5 text-sm text-slate-700 list-decimal list-inside leading-relaxed">
                <li>Menjamin pemenuhan hak warga negara untuk memperoleh akses informasi publik secara cepat dan tepat waktu.</li>
                <li>Meningkatkan kualitas tata kelola pendokumentasian dan pengarsipan informasi publik berbasis teknologi informasi.</li>
                <li>Mewujudkan sistem pelayanan publik yang transparan, mudah, bebas diskriminasi, dan akuntabel.</li>
                <li>Mendorong pengawasan dan partisipasi aktif publik dalam perumusan kebijakan serta evaluasi pembangunan daerah.</li>
            </ol>
        </div>
    </section>

    <!-- 3. Tugas Pokok & Fungsi (Tupoksi) -->
    <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm" aria-labelledby="heading-tupoksi">
        <h2 id="heading-tupoksi" class="text-xl font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
            <span>⚖️</span> Tugas Pokok & Fungsi (Tupoksi) PPID
        </h2>
        <p class="text-sm text-slate-600 mb-6">
            Sesuai UU No. 14 Tahun 2008 dan Peraturan Komisi Informasi, PPID mengemban tugas pokok dan fungsi sebagai berikut:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
                <div class="text-2xl mb-2">📂</div>
                <h3 class="text-sm font-bold text-slate-900 mb-2">Pengklasifikasian Informasi</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Menetapkan dan memutakhirkan Daftar Informasi Publik yang terdiri atas informasi berkala, serta-merta, dan setiap saat melalui pengujian konsekuensi yang sah.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
                <div class="text-2xl mb-2">🤝</div>
                <h3 class="text-sm font-bold text-slate-900 mb-2">Pelayanan Permohonan</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Menerima, memverifikasi, serta memproses permohonan informasi publik dari pemohon perseorangan maupun badan hukum secara tepat waktu.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
                <div class="text-2xl mb-2">🛡️</div>
                <h3 class="text-sm font-bold text-slate-900 mb-2">Penyelesaian Keberatan</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Mengoordinasikan penyusunan tanggapan tertulis atas pengajuan keberatan pemohon bersama Atasan PPID sesuai prosedur perundang-undangan.
                </p>
            </div>
        </div>
    </section>

    <!-- 4. Struktur Organisasi -->
    <section class="bg-white rounded-2xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-sm" aria-labelledby="heading-struktur">
        <h2 id="heading-struktur" class="text-lg sm:text-xl font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
            <span>🏛️</span> Struktur Organisasi PPID
        </h2>
        <p class="text-xs sm:text-sm text-slate-600 mb-6">
            Bagan hierarki tata kelola Pejabat Pengelola Informasi dan Dokumentasi Utama di lingkungan pemerintah daerah:
        </p>

        <div class="p-4 sm:p-6 rounded-xl bg-slate-50 border border-dashed border-slate-300 text-center space-y-4">
            <div class="inline-block max-w-full px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg text-white font-bold text-xs sm:text-sm shadow-sm break-words" style="background-color: var(--gov-primary, #1e3a8a);">
                Atasan PPID (Kepala Dinas / Sekretaris Daerah)
            </div>
            <div class="w-0.5 h-5 sm:h-6 bg-slate-300 mx-auto"></div>
            <div class="inline-block max-w-full px-4 sm:px-5 py-2 sm:py-2.5 rounded-lg bg-slate-800 text-white font-semibold text-xs shadow-sm break-words">
                Ketua PPID Utama (Sekretaris Dinas)
            </div>
            <div class="w-0.5 h-5 sm:h-6 bg-slate-300 mx-auto"></div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 max-w-2xl mx-auto pt-2">
                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800 shadow-2xs">
                    Bidang Pengolahan Data & Klasifikasi Dokumen
                </div>
                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800 shadow-2xs">
                    Bidang Pelayanan & Meja Informasi
                </div>
                <div class="p-3 bg-white rounded-lg border border-slate-200 text-xs font-semibold text-slate-800 shadow-2xs">
                    Bidang Advokasi Hukum & Sengketa Informasi
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Profil Pejabat Struktural -->
    <section class="bg-white rounded-2xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-sm" aria-labelledby="heading-pejabat">
        <h2 id="heading-pejabat" class="text-lg sm:text-xl font-bold text-slate-900 mb-6 pb-2 border-b border-slate-100 flex items-center gap-2">
            <span>👥</span> Profil Pejabat Struktural
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
            @foreach($pejabat as $p)
                <div class="p-4 sm:p-5 rounded-xl border border-slate-200 bg-slate-50/50 flex items-start gap-3.5 sm:gap-4 hover:bg-white hover:shadow-sm transition-all">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-lg sm:text-xl shrink-0 shadow-sm">
                        {{ substr($p['nama'], 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-bold text-slate-900 leading-snug truncate">{{ $p['nama'] }}</h3>
                        <p class="text-xs font-semibold text-blue-800 mt-0.5">{{ $p['jabatan'] }}</p>
                        <p class="text-[11px] text-slate-500 mt-1">NIP: {{ $p['nip'] }}</p>
                        <p class="text-[11px] text-slate-600 mt-0.5">🎓 {{ $p['pendidikan'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
