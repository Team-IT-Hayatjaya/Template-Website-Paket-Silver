{{-- Variabel Tema Dinamis Berdasarkan Pengaturan Instansi (Paket Silver) --}}
@php
    $warnaUtama = $pengaturan->warna_utama ?? '#1e3a8a';
    $warnaSekunder = $pengaturan->warna_sekunder ?? '#b91c1c';
    $faviconUrl = $pengaturan->favicon_url ?? asset('favicon.ico');
@endphp

<link rel="icon" type="image/x-icon" href="{{ $faviconUrl }}">
<style>
    :root {
        --gov-primary: {{ $warnaUtama }};
        --gov-primary-dark: {{ $warnaUtama }};
        --gov-secondary: {{ $warnaSekunder }};
        --gov-red: {{ $warnaSekunder }};
        --gov-gold: #d97706;
        --color-gov-primary: {{ $warnaUtama }};
        --color-gov-secondary: {{ $warnaSekunder }};
    }
</style>
