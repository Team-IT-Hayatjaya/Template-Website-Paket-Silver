@extends('layouts.admin')

@section('title', 'Pengaturan & Variabel Tema Instansi')
@section('header_title', 'Pengaturan Instansi & Variabel Tema')

@section('content')
<div style="max-width: 900px;">
    <div style="background: white; border: 1px solid var(--gov-border); border-radius: 12px; padding: 2rem; box-shadow: var(--gov-shadow); margin-bottom: 2rem;">
        <div style="margin-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem;">
            <h3 style="font-size: 1.3rem; font-weight: 700; color: var(--gov-primary-dark); margin-bottom: 0.25rem;">
                Identitas Instansi & Pengendali Tema Standar (Paket Silver)
            </h3>
            <p style="color: var(--gov-text-muted); font-size: 0.9rem;">
                Perubahan pada formulir ini akan langsung menyesuaikan identitas, logo, warna, dan kontak di seluruh halaman web tanpa mengubah struktur kode template.
            </p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 1.5rem;">
                <strong>Terjadi kesalahan pengisian formulir:</strong>
                <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Bagian 1: Identitas Nama Instansi -->
            <h4 style="font-size: 1.05rem; color: var(--gov-primary); margin-bottom: 1rem; border-left: 3px solid var(--gov-primary); padding-left: 0.5rem;">
                1. Identitas Nama & Satuan Kerja
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem;">
                <div class="form-group">
                    <label for="nama_instansi" class="form-label">Nama Instansi Utama <span style="color: var(--gov-red);">*</span></label>
                    <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" value="{{ old('nama_instansi', $pengaturan->nama_instansi) }}" required placeholder="Contoh: Pemerintah Kabupaten / Kota">
                    <small style="color: var(--gov-text-muted);">Ditampilkan pada judul situs dan kop header atas.</small>
                </div>

                <div class="form-group">
                    <label for="sub_nama_instansi" class="form-label">Sub Nama Instansi / Organisasi</label>
                    <input type="text" name="sub_nama_instansi" id="sub_nama_instansi" class="form-control" value="{{ old('sub_nama_instansi', $pengaturan->sub_nama_instansi) }}" placeholder="Contoh: Dinas Komunikasi dan Informatika">
                    <small style="color: var(--gov-text-muted);">Ditampilkan di bawah nama instansi utama.</small>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="nama_ppid" class="form-label">Nama Unit PPID <span style="color: var(--gov-red);">*</span></label>
                <input type="text" name="nama_ppid" id="nama_ppid" class="form-control" value="{{ old('nama_ppid', $pengaturan->nama_ppid) }}" required placeholder="Contoh: PPID Utama Pemerintah Daerah">
            </div>

            <!-- Bagian 2: Variabel Warna & Tema Dinamis -->
            <h4 style="font-size: 1.05rem; color: var(--gov-primary); margin-bottom: 1rem; border-left: 3px solid var(--gov-primary); padding-left: 0.5rem;">
                2. Variabel Tema Dinamis
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem;">
                <div class="form-group">
                    <label for="warna_utama" class="form-label">Warna Utama Tema (Hex) <span style="color: var(--gov-red);">*</span></label>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <input type="color" id="picker_warna_utama" value="{{ old('warna_utama', $pengaturan->warna_utama) }}" style="width: 44px; height: 38px; border: 1px solid var(--gov-border); border-radius: 6px; cursor: pointer;" oninput="document.getElementById('warna_utama').value = this.value">
                        <input type="text" name="warna_utama" id="warna_utama" class="form-control" value="{{ old('warna_utama', $pengaturan->warna_utama) }}" required pattern="^#([a-fA-F0-9]{6})$" placeholder="#1e3a8a" oninput="if(/^#([a-fA-F0-9]{6})$/.test(this.value)) document.getElementById('picker_warna_utama').value = this.value">
                    </div>
                    <small style="color: var(--gov-text-muted);">Mempengaruhi warna navbar, header, tombol utama, dan aksen latar.</small>
                </div>

                <div class="form-group">
                    <label for="warna_sekunder" class="form-label">Warna Sekunder / Aksen (Hex)</label>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <input type="color" id="picker_warna_sekunder" value="{{ old('warna_sekunder', $pengaturan->warna_sekunder ?? '#b91c1c') }}" style="width: 44px; height: 38px; border: 1px solid var(--gov-border); border-radius: 6px; cursor: pointer;" oninput="document.getElementById('warna_sekunder').value = this.value">
                        <input type="text" name="warna_sekunder" id="warna_sekunder" class="form-control" value="{{ old('warna_sekunder', $pengaturan->warna_sekunder ?? '#b91c1c') }}" pattern="^#([a-fA-F0-9]{6})$" placeholder="#b91c1c" oninput="if(/^#([a-fA-F0-9]{6})$/.test(this.value)) document.getElementById('picker_warna_sekunder').value = this.value">
                    </div>
                    <small style="color: var(--gov-text-muted);">Warna aksen tombol aksi khusus PPID dan garis tepi.</small>
                </div>
            </div>

            <!-- Bagian 3: Unggah Logo & Favicon -->
            <h4 style="font-size: 1.05rem; color: var(--gov-primary); margin-bottom: 1rem; border-left: 3px solid var(--gov-primary); padding-left: 0.5rem;">
                3. Berkas Lambang / Logo & Favicon
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label for="logo" class="form-label">Unggah Lambang / Logo Instansi</label>
                    @if($pengaturan->logo_url)
                        <div style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                            <img src="{{ $pengaturan->logo_url }}" alt="Logo saat ini" style="max-height: 48px; border: 1px solid #e2e8f0; padding: 4px; border-radius: 6px;">
                            <span style="font-size: 0.8rem; color: #10b981;">✓ Logo aktif terpasang</span>
                        </div>
                    @endif
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/webp,image/png,image/jpeg,image/svg+xml">
                    <small style="color: var(--gov-text-muted);">Format disarankan WebP atau PNG transparan (maks. 2 MB).</small>
                </div>

                <div class="form-group">
                    <label for="favicon" class="form-label">Unggah Favicon Peramban</label>
                    @if($pengaturan->favicon_path)
                        <div style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                            <img src="{{ $pengaturan->favicon_url }}" alt="Favicon saat ini" style="width: 24px; height: 24px; border: 1px solid #e2e8f0; border-radius: 4px;">
                            <span style="font-size: 0.8rem; color: #10b981;">✓ Favicon terpasang</span>
                        </div>
                    @endif
                    <input type="file" name="favicon" id="favicon" class="form-control" accept="image/x-icon,image/png,image/webp">
                    <small style="color: var(--gov-text-muted);">Format ICO, PNG, atau WebP (maks. 1 MB).</small>
                </div>
            </div>

            <!-- Bagian 4: Kontak & Jam Layanan -->
            <h4 style="font-size: 1.05rem; color: var(--gov-primary); margin-bottom: 1rem; border-left: 3px solid var(--gov-primary); padding-left: 0.5rem;">
                4. Informasi Kontak Meja Layanan PPID
            </h4>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem;">
                <div class="form-group">
                    <label for="telepon" class="form-label">Nomor Telepon Kantor</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon', $pengaturan->telepon) }}" placeholder="(021) 1234-5678">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email Resmi</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $pengaturan->email) }}" placeholder="ppid@instansi.go.id">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat Lengkap Kantor / Meja PPID</label>
                <textarea name="alamat" id="alamat" rows="2" class="form-control">{{ old('alamat', $pengaturan->alamat) }}</textarea>
            </div>

            <div class="form-group">
                <label for="jam_layanan" class="form-label">Jadwal Jam Kerja & Pelayanan</label>
                <textarea name="jam_layanan" id="jam_layanan" rows="2" class="form-control">{{ old('jam_layanan', $pengaturan->jam_layanan) }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="maklumat_pelayanan" class="form-label">Teks Maklumat Pelayanan Keterbukaan Informasi</label>
                <textarea name="maklumat_pelayanan" id="maklumat_pelayanan" rows="3" class="form-control">{{ old('maklumat_pelayanan', $pengaturan->maklumat_pelayanan) }}</textarea>
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary" id="btn-simpan-pengaturan">
                    💾 Simpan Pembaruan Pengaturan
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
