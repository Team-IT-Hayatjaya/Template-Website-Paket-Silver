@extends('layouts.app')

@section('title', 'Profil Instansi & PPID')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; color: var(--gov-primary-dark); font-weight: 800; margin-bottom: 0.5rem;">Profil Instansi & Pejabat Pengelola Informasi (PPID)</h1>
        <p style="color: var(--gov-text-muted);">Mengenal struktur, tugas fungsi, dan komitmen keterbukaan informasi publik instansi.</p>
    </div>

    <!-- Visi dan Misi -->
    <div class="gov-card" style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.4rem; color: var(--gov-primary); margin-bottom: 1rem; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem;">Visi & Misi</h2>
        <div style="margin-bottom: 1.5rem;">
            <h3 style="font-size: 1.1rem; color: var(--gov-primary-dark); margin-bottom: 0.4rem;">Visi</h3>
            <p style="font-style: italic; background: #f8fafc; padding: 1rem; border-left: 4px solid var(--gov-primary); border-radius: 0 6px 6px 0;">
                "Terwujudnya Tata Kelola Pemerintahan Daerah yang Terbuka, Transparan, Akuntabel, dan Memberikan Pelayanan Prima kepada Seluruh Lapisan Masyarakat."
            </p>
        </div>
        <div>
            <h3 style="font-size: 1.1rem; color: var(--gov-primary-dark); margin-bottom: 0.4rem;">Misi</h3>
            <ol style="padding-left: 1.25rem; color: var(--gov-text-dark); line-height: 1.8;">
                <li>Menjamin pemenuhan hak warga negara untuk memperoleh akses informasi publik secara cepat dan tepat waktu.</li>
                <li>Meningkatkan kualitas pengelolaan serta pendokumentasian informasi publik yang akurat dan mudah diakses.</li>
                <li>Mengembangkan sistem pelayanan informasi publik yang tertib dan berlandaskan pada prinsip tata kelola yang baik.</li>
                <li>Mewujudkan transparansi kinerja dan pertanggungjawaban program kerja instansi kepada publik.</li>
            </ol>
        </div>
    </div>

    <!-- Tugas Pokok & Fungsi (Tupoksi) PPID -->
    <div class="gov-card" style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.4rem; color: var(--gov-primary); margin-bottom: 1rem; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem;">Tugas & Fungsi PPID</h2>
        <p style="margin-bottom: 1rem;">
            Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, PPID bertugas mengoordinasikan pengumpulan, pendokumentasian, penyimpanan, dan pelayanan informasi publik di lingkungan badan publik.
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">
            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1.25rem;">
                <h4 style="color: var(--gov-primary-dark); margin-bottom: 0.5rem;">Pengklasifikasian Informasi</h4>
                <p style="font-size: 0.9rem; color: var(--gov-text-muted);">Mengelompokkan informasi publik menjadi kategori berkala, serta-merta, setiap saat, dan informasi yang dikecualikan sesuai pengujian konsekuensi.</p>
            </div>
            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1.25rem;">
                <h4 style="color: var(--gov-primary-dark); margin-bottom: 0.5rem;">Pelayanan Permohonan</h4>
                <p style="font-size: 0.9rem; color: var(--gov-text-muted);">Menerima, memproses, dan memberikan respon resmi atas permohonan informasi publik dari perseorangan maupun badan hukum.</p>
            </div>
            <div style="background: #f8fafc; border: 1px solid var(--gov-border); border-radius: 8px; padding: 1.25rem;">
                <h4 style="color: var(--gov-primary-dark); margin-bottom: 0.5rem;">Penyelesaian Keberatan</h4>
                <p style="font-size: 0.9rem; color: var(--gov-text-muted);">Mengoordinasikan penyelesaian pengajuan keberatan permohonan informasi bersama Atasan PPID sesuai prosedur hukum.</p>
            </div>
        </div>
    </div>

    <!-- Struktur Organisasi Standar -->
    <div class="gov-card">
        <h2 style="font-size: 1.4rem; color: var(--gov-primary); margin-bottom: 1rem; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem;">Bagan Struktur PPID Standar</h2>
        <div style="background: #f8fafc; border: 1px dashed var(--gov-border); border-radius: 8px; padding: 2rem; text-align: center;">
            <div style="display: inline-block; background: var(--gov-primary-dark); color: white; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: 700; margin-bottom: 1.5rem;">
                Atasan PPID (Sekretaris Daerah / Kepala Dinas)
            </div>
            <div style="width: 2px; height: 24px; background: #94a3b8; margin: 0 auto;"></div>
            <div style="display: inline-block; background: var(--gov-primary); color: white; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: 700; margin-bottom: 1.5rem;">
                Ketua PPID Utama
            </div>
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-top: 1rem;">
                <div style="background: white; border: 1px solid var(--gov-border); padding: 0.75rem 1.25rem; border-radius: 6px; font-size: 0.9rem;">
                    <strong>Bidang Pendokumentasian & Arsip</strong>
                </div>
                <div style="background: white; border: 1px solid var(--gov-border); padding: 0.75rem 1.25rem; border-radius: 6px; font-size: 0.9rem;">
                    <strong>Bidang Pelayanan & Pengaduan</strong>
                </div>
                <div style="background: white; border: 1px solid var(--gov-border); padding: 0.75rem 1.25rem; border-radius: 6px; font-size: 0.9rem;">
                    <strong>Bidang Advokasi & Sengketa</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
