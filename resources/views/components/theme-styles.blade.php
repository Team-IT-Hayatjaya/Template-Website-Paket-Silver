{{-- Variabel Tema Dinamis Berdasarkan Pengaturan Instansi --}}
@php
    $warnaUtama = $pengaturan->warna_utama ?? '#1e3a8a';
    $warnaSekunder = $pengaturan->warna_sekunder ?? '#b91c1c';
    $faviconUrl = $pengaturan->favicon_url ?? asset('favicon.ico');
@endphp

<link rel="icon" href="{{ $faviconUrl }}">
<style>
    :root {
        --gov-primary: {{ $warnaUtama }};
        --gov-primary-dark: {{ $warnaUtama }};
        --gov-red: {{ $warnaSekunder }};
    }
</style>
