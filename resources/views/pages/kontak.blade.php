@extends('layouts.app')

@section('title', 'Kontak & Lokasi Kantor PPID')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; color: var(--gov-primary-dark); font-weight: 800; margin-bottom: 0.5rem;">Kontak Kami & Meja Layanan PPID</h1>
        <p style="color: var(--gov-text-muted);">Informasi alamat, saluran komunikasi resmi, serta jadwal pelayanan langsung Pejabat Pengelola Informasi dan Dokumentasi.</p>
    </div>

    <div class="grid-cols-3" style="margin-bottom: 2.5rem;">
        <!-- Card 1: Alamat Fisik -->
        <div class="gov-card">
            <div class="gov-card-icon">📍</div>
            <h3>Alamat Kantor</h3>
            <p>
                <strong>Gedung Sekretariat Daerah Lt. 2</strong><br>
                Jl. Pahlawan No. 45, Kompleks Perkantoran Pemerintah<br>
                Kabupaten / Kota, Kode Pos 12345
            </p>
            <small style="color: var(--gov-primary); font-weight: 600;">Meja Pelayanan PPID berada di Lobby Gedung A.</small>
        </div>

        <!-- Card 2: Saluran Komunikasi -->
        <div class="gov-card">
            <div class="gov-card-icon">☎️</div>
            <h3>Saluran Komunikasi Resmi</h3>
            <p>
                <strong>Telepon Kantor:</strong> (021) 1234-5678<br>
                <strong>Faks:</strong> (021) 1234-5679<br>
                <strong>Email Pelayanan PPID:</strong> ppid@instansi.go.id<br>
                <strong>Email Instansi:</strong> diskominfo@instansi.go.id
            </p>
        </div>

        <!-- Card 3: Jam Layanan -->
        <div class="gov-card">
            <div class="gov-card-icon">🕒</div>
            <h3>Jam Pelayanan Tatap Muka</h3>
            <p>
                <strong>Senin - Kamis:</strong> 08.00 - 15.30 WIB<br>
                <strong>Jumat:</strong> 08.00 - 15.00 WIB<br>
                <strong>Istirahat Siang:</strong> 12.00 - 13.00 WIB<br>
                <em>(Sabtu, Minggu & Hari Libur Nasional Tutup)</em>
            </p>
        </div>
    </div>

    <!-- Petunjuk Prosedur Datang Langsung -->
    <div class="gov-card">
        <h2 style="font-size: 1.3rem; color: var(--gov-primary); margin-bottom: 1rem; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem;">Panduan Berkunjung ke Meja Pelayanan PPID</h2>
        <ol style="padding-left: 1.25rem; color: var(--gov-text-dark); line-height: 1.8;">
            <li>Pemohon informasi datang langsung ke Meja Layanan PPID pada jam kerja yang telah ditentukan.</li>
            <li>Membawa dan menunjukkan kartu identitas resmi yang masih berlaku (KTP/SIM untuk perorangan, atau Akta Notaris/SK untuk badan hukum).</li>
            <li>Mengisi formulir permohonan informasi publik dengan jelas dan menyebutkan tujuan penggunaan informasi.</li>
            <li>Petugas meja pelayanan akan memverifikasi dokumen permohonan dan memberikan tanda bukti penerimaan.</li>
        </ol>
    </div>
@endsection
