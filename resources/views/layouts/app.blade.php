<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - {{ $pengaturan->nama_instansi ?? config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', 'Portal Resmi Instansi Pemerintah Republik Indonesia - Layanan Publik dan Keterbukaan Informasi Publik (PPID) sesuai UU No. 14 Tahun 2008.')">
    
    <!-- CSS Fallback Instansi -->
    <link rel="stylesheet" href="{{ asset('css/instansi.css') }}">

    <!-- Vite Assets (Tailwind CSS & Alpine.js) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Variabel Tema Dinamis Terpusat -->
    <x-theme-styles />

    @stack('styles')
</head>
<body class="flex flex-col min-h-full font-sans antialiased text-slate-800 bg-slate-50">

    <!-- Header Instansi Modular (Logo, Menu, Pencarian & Mobile Drawer Alpine.js) -->
    <x-header />

    <!-- Konten Utama Semantik -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8" id="main-content">
        @if(session('success'))
            <x-alert type="success" title="Berhasil" dismissible="true" class="mb-6">
                {{ session('success') }}
            </x-alert>
        @endif

        @if(session('error'))
            <x-alert type="danger" title="Kesalahan" dismissible="true" class="mb-6">
                {{ session('error') }}
            </x-alert>
        @endif

        @if(session('info'))
            <x-alert type="info" title="Informasi" dismissible="true" class="mb-6">
                {{ session('info') }}
            </x-alert>
        @endif

        @yield('content')
    </main>

    <!-- Footer Instansi Modular (Alamat, Kontak, Medsos, Peta Situs, Hak Cipta HJT) -->
    <x-footer />

    @stack('scripts')
</body>
</html>
