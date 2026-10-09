@extends('layouts.admin')

@section('title', 'Dasbor Utama')
@section('header_title', 'Ringkasan Statistik & Operasional')

@section('content')
    <!-- Kartu Statistik Utama -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
        
        <!-- Total Permohonan -->
        <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 1.5rem; box-shadow: var(--gov-shadow);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                <span style="font-size: 0.85rem; color: var(--gov-text-muted); font-weight: 600; text-transform: uppercase;">Permohonan Informasi</span>
                <span style="font-size: 1.3rem;">📥</span>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--gov-primary-dark);" id="stat-total-permohonan">
                {{ $stats['total_permohonan'] }}
            </div>
            <div style="font-size: 0.8rem; color: #10b981; margin-top: 0.25rem;">
                Menunggu respon PPID
            </div>
        </div>

        <!-- Total Keberatan -->
        <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 1.5rem; box-shadow: var(--gov-shadow);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                <span style="font-size: 0.85rem; color: var(--gov-text-muted); font-weight: 600; text-transform: uppercase;">Pengajuan Keberatan</span>
                <span style="font-size: 1.3rem;">⚖️</span>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--gov-red);" id="stat-total-keberatan">
                {{ $stats['total_keberatan'] }}
            </div>
            <div style="font-size: 0.8rem; color: var(--gov-text-muted); margin-top: 0.25rem;">
                Sengketa / tanggapan
            </div>
        </div>

        <!-- Total DIP -->
        <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 1.5rem; box-shadow: var(--gov-shadow);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                <span style="font-size: 0.85rem; color: var(--gov-text-muted); font-weight: 600; text-transform: uppercase;">Katalog DIP Aktif</span>
                <span style="font-size: 1.3rem;">📚</span>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--gov-gold);" id="stat-total-dip">
                {{ $stats['total_dip'] }}
            </div>
            <div style="font-size: 0.8rem; color: var(--gov-text-muted); margin-top: 0.25rem;">
                Informasi berkala & setiap saat
            </div>
        </div>

        <!-- Status Backup & Cron -->
        <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 1.5rem; box-shadow: var(--gov-shadow);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                <span style="font-size: 0.85rem; color: var(--gov-text-muted); font-weight: 600; text-transform: uppercase;">Cadangan Bulanan</span>
                <span style="font-size: 1.3rem;">💾</span>
            </div>
            <div style="font-size: 1.25rem; font-weight: 700; color: #10b981; margin: 0.4rem 0;" id="stat-status-backup">
                Siap (Cron Aktif)
            </div>
            <div style="font-size: 0.8rem; color: var(--gov-text-muted);">
                Tugas: <code>schedule:run</code>
            </div>
        </div>

    </div>

    <!-- Informasi Konfigurasi Lingkungan (Paket Silver) -->
    <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 1.75rem; box-shadow: var(--gov-shadow); margin-bottom: 2rem;">
        <h4 style="font-size: 1.15rem; color: var(--gov-primary-dark); margin-bottom: 0.75rem;">Status Spesifikasi Sistem (Paket Silver)</h4>
        <p style="color: var(--gov-text-muted); font-size: 0.925rem; margin-bottom: 1.25rem;">
            Konfigurasi sistem disesuaikan untuk efisiensi cloud hosting standar / VPS kecil tanpa ketergantungan layanan berat eksternal (Redis / Docker).
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem;">
            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1rem;">
                <span style="font-size: 0.8rem; color: var(--gov-text-muted); display: block;">Modul PPID Regulasi:</span>
                <strong style="color: var(--gov-primary-dark);">UU No. 14 Tahun 2008</strong>
            </div>

            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1rem;">
                <span style="font-size: 0.8rem; color: var(--gov-text-muted); display: block;">Driver Antrean (Queue):</span>
                <strong style="color: var(--gov-primary-dark);">Database / Sync</strong>
            </div>

            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1rem;">
                <span style="font-size: 0.8rem; color: var(--gov-text-muted); display: block;">Penyedia Pengembang:</span>
                <strong style="color: var(--gov-primary-dark);">PT Hayat Jaya Teknologi (HJT)</strong>
            </div>

            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1rem;">
                <span style="font-size: 0.8rem; color: var(--gov-text-muted); display: block;">Tingkat Layanan:</span>
                <strong style="color: #b45309;">SILVER</strong>
            </div>
        </div>
    </div>
@endsection
