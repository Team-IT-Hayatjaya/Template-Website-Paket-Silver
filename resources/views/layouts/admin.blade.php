<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dasbor') - Panel Administrasi PPID</title>
    <link rel="stylesheet" href="{{ asset('css/instansi.css') }}">
    @stack('styles')
</head>
<body>

    <div class="admin-layout">
        <!-- Bilah Samping (Sidebar) -->
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                <h2>Panel Admin PPID</h2>
                <p>Paket Silver &bull; PT Hayat Jaya Teknologi</p>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" id="nav-admin-dashboard">
                    📊 Dasbor Ringkasan
                </a>
                <a href="#permohonan" id="nav-admin-permohonan">
                    📥 Permohonan Informasi
                </a>
                <a href="#keberatan" id="nav-admin-keberatan">
                    ⚖️ Pengajuan Keberatan
                </a>
                <a href="#dip" id="nav-admin-dip">
                    📚 Kelola DIP (Katalog)
                </a>
                <a href="#berita" id="nav-admin-berita">
                    📰 Berita & Pengumuman
                </a>
                <a href="#backup" id="nav-admin-backup">
                    💾 Cadangan Data (Backup)
                </a>
                <div style="margin: 1.5rem 1.25rem 0.5rem 1.25rem; border-top: 1px solid #1e293b; padding-top: 1rem;">
                    <a href="{{ route('home') }}" target="_blank" style="padding-left: 0; color: #38bdf8;" id="nav-admin-view-site">
                        🌐 Buka Halaman Publik &nearr;
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Area Konten Utama -->
        <div class="admin-main">
            <!-- Topbar Panel Admin -->
            <header class="admin-topbar">
                <div>
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--gov-primary-dark);">@yield('header_title', 'Dasbor Administrator')</h3>
                </div>
                <div style="display: flex; align-items: center; gap: 1.25rem;">
                    <div style="font-size: 0.9rem;">
                        <span style="color: var(--gov-text-muted);">Masuk sebagai:</span>
                        <strong style="color: var(--gov-primary-dark);">{{ auth()->user()->name }}</strong>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-light" style="padding: 0.4rem 0.9rem; font-size: 0.85rem;" id="btn-admin-logout">
                            🚪 Keluar
                        </button>
                    </form>
                </div>
            </header>

            <!-- Isi Halaman -->
            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success" role="alert" id="admin-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('info'))
                    <div class="alert alert-info" role="alert" id="admin-alert-info">
                        {{ session('info') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert" id="admin-alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
