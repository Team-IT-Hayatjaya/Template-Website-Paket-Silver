<footer class="bg-slate-900 text-slate-300 pt-12 pb-8 border-t-4" style="border-top-color: var(--gov-secondary, #b91c1c);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            <!-- Kolom 1: Profil Instansi & Alamat -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <x-logo class="w-10 h-10" />
                    <div class="min-w-0">
                        <h2 class="text-sm font-bold text-white uppercase tracking-wider truncate">
                            {{ $pengaturan->nama_instansi ?? 'PEMERINTAH DAERAH' }}
                        </h2>
                        <p class="text-xs text-slate-400 truncate">
                            {{ $pengaturan->sub_nama_instansi ?? 'Dinas Komunikasi dan Informatika' }}
                        </p>
                    </div>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed mb-4">
                    {{ $pengaturan->nama_ppid ?? 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) Utama' }} melayani permohonan informasi publik secara transparan, akuntabel, dan berintegritas.
                </p>
                <address class="not-italic text-xs text-slate-400 leading-relaxed">
                    📍 {{ $pengaturan->alamat ?? 'Gedung Sekretariat Daerah Lt. 2, Jl. Pahlawan No. 45' }}
                </address>
            </div>

            <!-- Kolom 2: Kontak & Jam Layanan -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-3 pb-1 border-b-2 border-amber-500 inline-block">
                    Kontak & Layanan
                </h3>
                <ul class="space-y-2 text-xs text-slate-400">
                    @if($pengaturan?->telepon)
                        <li class="flex items-center gap-2">
                            <span aria-hidden="true">📞</span> Telepon: <span class="text-white">{{ $pengaturan->telepon }}</span>
                        </li>
                    @endif
                    @if($pengaturan?->email)
                        <li class="flex items-center gap-2">
                            <span aria-hidden="true">✉️</span> Email: <a href="mailto:{{ $pengaturan->email }}" class="text-blue-400 hover:underline">{{ $pengaturan->email }}</a>
                        </li>
                    @endif
                    <li class="pt-2">
                        <strong class="text-white block mb-1">Jam Operasional Pelayanan:</strong>
                        <p class="whitespace-pre-line text-slate-300">
                            {{ $pengaturan->jam_layanan ?? "Senin - Kamis: 08.00 - 15.30 WIB\nJumat: 08.00 - 15.00 WIB" }}
                        </p>
                        <small class="text-slate-500 block mt-1">Sabtu, Minggu & Hari Libur Nasional Tutup</small>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Peta Situs (Sitemap) -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-3 pb-1 border-b-2 border-amber-500 inline-block">
                    Peta Situs
                </h3>
                <ul class="space-y-1.5 text-xs">
                    <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-colors">&bull; Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="text-slate-400 hover:text-white transition-colors">&bull; Profil Instansi & PPID</a></li>
                    <li><a href="{{ route('home') }}#ppid" class="text-slate-400 hover:text-white transition-colors">&bull; Daftar Informasi Publik (DIP)</a></li>
                    <li><a href="{{ route('home') }}#ppid" class="text-slate-400 hover:text-white transition-colors">&bull; Formulir Permohonan Informasi</a></li>
                    <li><a href="{{ route('home') }}#ppid" class="text-slate-400 hover:text-white transition-colors">&bull; Pengajuan Keberatan</a></li>
                    <li><a href="{{ route('komponen') }}" class="text-slate-400 hover:text-white transition-colors">&bull; Galeri Komponen UI</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-slate-400 hover:text-white transition-colors">&bull; Kontak & Meja Pelayanan</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Media Sosial & Dasar Hukum -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-3 pb-1 border-b-2 border-amber-500 inline-block">
                    Media Sosial Resmi
                </h3>
                <p class="text-xs text-slate-400 mb-3">Ikuti kanal media sosial resmi kami untuk kabar dan siaran pers terkini:</p>
                <div class="flex items-center gap-3 mb-6">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 sm:w-8 sm:h-8 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center text-white text-xs transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400" aria-label="Facebook Resmi Instansi">
                        FB
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 sm:w-8 sm:h-8 rounded-full bg-slate-800 hover:bg-pink-600 flex items-center justify-center text-white text-xs transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400" aria-label="Instagram Resmi Instansi">
                        IG
                    </a>
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 sm:w-8 sm:h-8 rounded-full bg-slate-800 hover:bg-red-600 flex items-center justify-center text-white text-xs transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400" aria-label="YouTube Resmi Instansi">
                        YT
                    </a>
                    <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="w-9 h-9 sm:w-8 sm:h-8 rounded-full bg-slate-800 hover:bg-slate-700 flex items-center justify-center text-white text-xs transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400" aria-label="X / Twitter Resmi Instansi">
                        𝕏
                    </a>
                </div>

                <div class="p-3 bg-slate-800/80 rounded-lg border border-slate-700">
                    <span class="text-[11px] text-amber-400 font-semibold uppercase block">Dasar Hukum KIP:</span>
                    <p class="text-[11px] text-slate-300 mt-0.5 leading-snug">
                        UU Republik Indonesia No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                    </p>
                </div>
            </div>
        </div>

        <!-- Bagian Bawah: Hak Cipta -->
        <div class="pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} {{ $pengaturan->nama_instansi ?? 'Portal Resmi Pemerintah Daerah' }}. Hak Cipta Dilindungi Undang-Undang.</p>
            <p class="mt-1">
                Dikembangkan oleh <strong class="text-slate-400">PT Hayat Jaya Teknologi (HJT)</strong> &bull; Paket SILVER
            </p>
        </div>
    </div>
</footer>
