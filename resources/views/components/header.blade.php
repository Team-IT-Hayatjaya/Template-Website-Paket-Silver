<div x-data="{ mobileOpen: false, searchOpen: false }">
    <!-- Topbar Resmi -->
    <div class="gov-topbar">
        <div class="gov-topbar-content text-[11px] sm:text-xs">
            <div class="flex items-center gap-1.5 sm:gap-2 min-w-0">
                <span class="truncate">🇮🇩 Portal Resmi {{ $pengaturan->nama_instansi ?? 'Pemerintah Daerah' }}</span>
                <span class="hidden md:inline opacity-50" aria-hidden="true">|</span>
                <span class="hidden md:inline text-slate-300">Standar Keterbukaan Informasi UU No. 14/2008</span>
            </div>
            <div class="hidden sm:flex items-center gap-2 text-slate-300 shrink-0">
                <span aria-hidden="true">🕒</span>
                <span>Pelayanan: {{ $pengaturan->jam_layanan ? Str::limit($pengaturan->jam_layanan, 42) : 'Senin - Jumat (08.00 - 15.30 WIB)' }}</span>
            </div>
        </div>
    </div>

    <!-- Header Instansi (Logo, Nama, Pencarian & Aksi) -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-3.5 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-3 sm:gap-4">
            <!-- Brand Instansi -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3.5 text-inherit no-underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600 rounded-lg min-w-0" id="header-brand-link">
                <x-logo class="shrink-0" />
                <div class="min-w-0">
                    <h1 class="text-xs sm:text-sm md:text-base font-bold uppercase tracking-tight text-slate-900 leading-tight truncate">
                        {{ $pengaturan->nama_instansi ?? 'PEMERINTAH KABUPATEN / KOTA' }}
                    </h1>
                    <p class="text-[10px] sm:text-xs text-slate-500 font-medium leading-tight mt-0.5 truncate">
                        {{ $pengaturan->sub_nama_instansi ?? 'DINAS KOMUNIKASI DAN INFORMATIKA' }} &bull; {{ $pengaturan->nama_ppid ?? 'PPID UTAMA' }}
                    </p>
                </div>
            </a>

            <!-- Pencarian Cepat Desktop & Tombol Masuk Admin -->
            <div class="hidden lg:flex items-center gap-3 shrink-0">
                <form action="{{ route('home') }}#berita" method="GET" class="relative" role="search">
                    <label for="desktop-search-input" class="sr-only">Cari informasi atau dokumen publik</label>
                    <input type="search" 
                           id="desktop-search-input"
                           name="q" 
                           placeholder="Cari informasi publik..." 
                           class="w-60 xl:w-72 pl-9 pr-4 py-2 text-xs rounded-full border border-slate-300 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                    <span class="absolute left-3 top-2.5 text-slate-400 text-xs" aria-hidden="true">🔍</span>
                </form>

                <a href="{{ route('admin.login') }}" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-lg border border-slate-300 text-slate-700 bg-white hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600 shadow-2xs"
                   id="header-admin-login-link">
                    <span aria-hidden="true">🔒</span> Masuk Admin
                </a>
            </div>

            <!-- Tombol Hamburger Menu Mobile (Alpine.js) -->
            <div class="flex items-center gap-2 lg:hidden shrink-0">
                <button type="button" 
                        @click="mobileOpen = !mobileOpen" 
                        :aria-expanded="mobileOpen.toString()"
                        aria-controls="mobile-navigation-menu"
                        class="w-11 h-11 flex items-center justify-center rounded-lg text-slate-700 hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 cursor-pointer"
                        aria-label="Buka menu navigasi utama">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Navigasi Utama Desktop -->
    <nav class="hidden lg:block shadow-sm sticky top-0 z-40" style="background-color: var(--gov-primary, #1e3a8a);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <ul class="flex items-center gap-0.5 xl:gap-1 text-sm font-medium text-white">
                <li>
                    <a href="{{ route('home') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('home') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('profil') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('layanan') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Layanan Publik
                    </a>
                </li>
                <li>
                    <a href="{{ route('berita.index') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('berita.*') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Berita
                    </a>
                </li>
                <li>
                    <a href="{{ route('publikasi') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('publikasi') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Publikasi Dokumen
                    </a>
                </li>
                <li>
                    <a href="{{ route('galeri') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('galeri') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Galeri
                    </a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}" 
                       class="inline-block px-3 py-3 border-b-2 {{ request()->routeIs('kontak') ? 'border-amber-400 font-semibold bg-white/10' : 'border-transparent hover:bg-white/10' }} transition-colors">
                        Kontak & Pengaduan
                    </a>
                </li>
            </ul>

            <div class="py-2">
                <a href="{{ route('home') }}#ppid" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-white rounded-md shadow-sm transition-opacity hover:opacity-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2"
                   style="background-color: var(--gov-secondary, #b91c1c);">
                    📋 Layanan PPID
                </a>
            </div>
        </div>
    </nav>

    <!-- Navigasi Mobile Drawer (Alpine.js) -->
    <div id="mobile-navigation-menu" 
         x-show="mobileOpen" 
         x-cloak 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileOpen = false"
         class="lg:hidden border-b border-slate-200 bg-white shadow-xl transition-all max-h-[calc(100vh-80px)] overflow-y-auto">
        
        <!-- Formulir Pencarian Mobile -->
        <div class="p-4 border-b border-slate-100 bg-slate-50">
            <form action="{{ route('berita.index') }}" method="GET" role="search" class="relative">
                <label for="mobile-search-input" class="sr-only">Cari berita atau dokumen publik</label>
                <input type="search" 
                       id="mobile-search-input"
                       name="q" 
                       placeholder="Cari berita atau dokumen..." 
                       class="w-full pl-9 pr-4 py-2 text-sm rounded-lg border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                <span class="absolute left-3 top-2.5 text-slate-400 text-sm" aria-hidden="true">🔍</span>
            </form>
        </div>

        <ul class="py-2.5 px-3 space-y-1 text-sm font-medium text-slate-800">
            <li>
                <a href="{{ route('home') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>🏠</span> Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('profil') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>🏛️</span> Profil Instansi
                </a>
            </li>
            <li>
                <a href="{{ route('layanan') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('layanan') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>🛠️</span> Layanan Publik
                </a>
            </li>
            <li>
                <a href="{{ route('berita.index') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('berita.*') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>📰</span> Berita Terkini
                </a>
            </li>
            <li>
                <a href="{{ route('publikasi') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('publikasi') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>📚</span> Publikasi & Dokumen
                </a>
            </li>
            <li>
                <a href="{{ route('galeri') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('galeri') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>📷</span> Galeri Foto
                </a>
            </li>
            <li>
                <a href="{{ route('kontak') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('kontak') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>📞</span> Kontak & Pengaduan
                </a>
            </li>
            <li>
                <a href="{{ route('komponen') }}" 
                   @click="mobileOpen = false"
                   class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('komponen') ? 'bg-blue-50 text-blue-900 font-bold' : 'hover:bg-slate-100' }}">
                    <span>🧩</span> Komponen UI
                </a>
            </li>
            <li class="pt-2 border-t border-slate-100">
                <a href="{{ route('home') }}#ppid" 
                   @click="mobileOpen = false"
                   class="block px-3 py-2.5 text-center rounded-lg text-white font-bold shadow-sm"
                   style="background-color: var(--gov-secondary, #b91c1c);">
                    📋 Layanan PPID Online
                </a>
            </li>
            <li class="pt-1">
                <a href="{{ route('admin.login') }}" 
                   @click="mobileOpen = false"
                   class="block px-3 py-2 text-center text-xs text-slate-600 rounded-lg border border-slate-200 hover:bg-slate-50">
                    🔒 Masuk Panel Admin
                </a>
            </li>
        </ul>
    </div>
</div>
