@extends('layouts.app')

@section('title', 'Kontak & Pengaduan Masyarakat')

@push('styles')
    <!-- Leaflet CSS untuk Peta OpenStreetMap (Ringan & Gratis) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map-container {
            height: 380px;
            width: 100%;
            border-radius: 12px;
            z-index: 1;
        }
    </style>
@endpush

@section('content')
<div class="space-y-10">
    <!-- Header Halaman Kontak -->
    <div class="border-b border-slate-200 pb-6">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">
            Saluran Resmi
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">
            Kontak Kami & Formulir Aspirasi Pengaduan
        </h1>
        <p class="text-sm text-slate-600 mt-1 max-w-3xl leading-relaxed">
            Hubungi meja pelayanan informasi kami atau sampaikan aspirasi, saran, dan pengaduan masyarakat secara langsung melalui saluran resmi yang tersedia.
        </p>
    </div>

    <!-- Kartu Informasi Kontak Cepat -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Alamat -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
            <div>
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center text-xl mb-3">
                    📍
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Alamat Kantor Meja PPID</h3>
                <address class="not-italic text-xs text-slate-600 leading-relaxed">
                    {{ $pengaturan->alamat ?? 'Gedung Sekretariat Daerah Lt. 2, Jl. Pahlawan No. 45, Kompleks Perkantoran Pemerintah' }}
                </address>
            </div>
            <span class="text-[11px] font-semibold text-blue-800 mt-4 block">Meja Pelayanan di Lobi Utama</span>
        </div>

        <!-- Telepon & Email -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
            <div>
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl mb-3">
                    ☎️
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Telepon & Email</h3>
                <ul class="text-xs text-slate-600 space-y-1 leading-relaxed">
                    <li>Telepon: <strong class="text-slate-800">{{ $pengaturan->telepon ?? '(021) 1234-5678' }}</strong></li>
                    <li>Email: <a href="mailto:{{ $pengaturan->email ?? 'ppid@instansi.go.id' }}" class="text-blue-700 hover:underline">{{ $pengaturan->email ?? 'ppid@instansi.go.id' }}</a></li>
                </ul>
            </div>
            <span class="text-[11px] font-semibold text-emerald-800 mt-4 block">Respon Cepat Hari Kerja</span>
        </div>

        <!-- Jam Pelayanan -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
            <div>
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-xl mb-3">
                    🕒
                </div>
                <h3 class="text-sm font-bold text-slate-900 mb-1">Jam Pelayanan Langsung</h3>
                <p class="whitespace-pre-line text-xs text-slate-600 leading-relaxed">
                    {{ $pengaturan->jam_layanan ?? "Senin - Kamis: 08.00 - 15.30 WIB\nJumat: 08.00 - 15.00 WIB" }}
                </p>
            </div>
            <span class="text-[11px] text-slate-400 mt-4 block">Sabtu, Minggu & Hari Libur Tutup</span>
        </div>
    </div>

    <!-- Bagian 2 Kolom: Formulir Pengaduan & Peta Leaflet -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        <!-- Formulir Pengaduan & Pesan Masyarakat -->
        <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm" aria-labelledby="heading-form-kontak">
            <h2 id="heading-form-kontak" class="text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
                <span>💬</span> Formulir Aspirasi & Pengaduan
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mb-6">
                Sampaikan aspirasi atau aduan pelayanan. Sesuai paket Silver, tanggapan resmi akan diteruskan ke kontak yang Anda cantumkan.
            </p>

            <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-4">
                @csrf

                <x-form-input name="nama" 
                              label="Nama Lengkap" 
                              placeholder="Masukkan nama lengkap Anda" 
                              required="true" 
                              :error="$errors->first('nama')" />

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-form-input name="email" 
                                  label="Alamat Email" 
                                  type="email" 
                                  placeholder="nama@email.com" 
                                  required="true" 
                                  :error="$errors->first('email')" />

                    <x-form-input name="telepon" 
                                  label="Nomor WhatsApp / HP" 
                                  type="tel" 
                                  placeholder="08123456789" 
                                  :error="$errors->first('telepon')" />
                </div>

                <x-form-input name="topik" 
                              label="Topik Pesan / Kategori Pengaduan" 
                              type="select" 
                              required="true"
                              placeholder="-- Pilih Topik Pengaduan --"
                              :options="[
                                  'pelayanan_ppid' => 'Pelayanan Informasi PPID',
                                  'aspirasi_kebijakan' => 'Aspirasi & Saran Kebijakan',
                                  'infrastruktur' => 'Layanan Infrastruktur & Jaringan',
                                  'lainnya' => 'Pertanyaan / Informasi Umum'
                              ]"
                              :error="$errors->first('topik')" />

                <x-form-input name="pesan" 
                              label="Uraian Aspirasi atau Pengaduan" 
                              type="textarea" 
                              rows="4"
                              placeholder="Tuliskan secara lengkap pesan, pertanyaan, atau keluhan Anda..." 
                              required="true" 
                              :error="$errors->first('pesan')" />

                <div class="pt-2">
                    <x-button variant="primary" type="submit" class="w-full sm:w-auto">
                        📤 Kirim Pesan / Pengaduan
                    </x-button>
                </div>
            </form>
        </section>

        <!-- Lokasi Kantor & Peta Interaktif Leaflet (OpenStreetMap) -->
        <section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm" aria-labelledby="heading-peta">
            <h2 id="heading-peta" class="text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
                <span>🗺️</span> Lokasi Kantor & Meja Layanan
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mb-4">
                Peta lokasi kantor instansi menggunakan OpenStreetMap (bebas lisensi pihak ketiga).
            </p>

            <div id="map-container" class="border border-slate-300" aria-label="Peta Lokasi Kantor Instansi"></div>
            
            <div class="mt-4 p-3 bg-slate-50 rounded-xl border border-slate-200 text-xs text-slate-600 leading-relaxed">
                <strong>Petunjuk Arah:</strong> Dari Bundaran Kota, masuk ke Jalan Protokol arah Kompleks Perkantoran Pemerintah. Meja Layanan PPID berada tepat di Lobi Gedung A.
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Script Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi peta Leaflet (koordinat Jakarta Pusat / Balai Kota standar)
            var map = L.map('map-container').setView([-6.1753924, 106.8271528], 15);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([-6.1753924, 106.8271528]).addTo(map);
            marker.bindPopup("<b>Meja Layanan PPID Utama</b><br>{{ $pengaturan->nama_instansi ?? 'Kantor Pemerintah' }}<br><small>Senin-Jumat 08.00-15.30 WIB</small>").openPopup();
        });
    </script>
@endpush
