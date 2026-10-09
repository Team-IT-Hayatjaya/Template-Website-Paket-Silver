# Rules Proyek: Template Website Instansi Pemerintah (Paket Silver)

- Proyek: Website instansi pemerintah buatan PT Hayat Jaya Teknologi (HJT), paket SILVER.
- Bahasa antarmuka: Bahasa Indonesia.
- Modul PPID mengacu pada UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
- Cakupan Silver: template web standar, menu PPID dasar (formulir permohonan, keberatan sederhana, Daftar Informasi Publik), panel admin, laporan sederhana, backup bulanan.
- DI LUAR CAKUPAN (JANGAN DIBUAT):
  * Cek status publik atau tracking resi
  * Tenggat otomatis dan pengingat
  * Riwayat status
  * Jawaban di dalam sistem
  * Widget aksesibilitas (TTS, kontras, ukuran teks)
  * Desain kustom
  * Open Data
  * WhatsApp Bot
  * Sub-domain
  * Multi-unit
  * Bila ragu apakah sesuatu masuk Silver, tanyakan dulu.
- Hosting: Cloud hosting standar (shared atau VPS kecil). Jangan bergantung pada Redis, worker yang berjalan terus, atau Docker di produksi. Antrean memakai driver database atau sync; tugas terjadwal lewat cron php artisan schedule:run.
- Aturan kerja:
  * Kerjakan satu modul per tugas.
  * Jelaskan rencana sebelum mengubah banyak file.
  * Jangan mengubah file di luar cakupan tugas.
  * Jangan menulis kredensial atau data pribadi asli ke kode (pakai .env dan .env.example).
  * Setelah selesai jalankan test dan tulis ringkasan perubahan beserta cara mengujinya.
