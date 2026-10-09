@props(['class' => ''])

@if(!empty($pengaturan?->logo_url))
    <img src="{{ $pengaturan->logo_url }}" 
         alt="Lambang Resmi {{ $pengaturan->nama_instansi }}" 
         loading="lazy" 
         class="{{ $class }}"
         style="max-height: 52px; width: auto; object-fit: contain;">
@else
    <div class="gov-logo-badge {{ $class }}" aria-label="Lambang Resmi Republik Indonesia">
        <span>RI</span>
    </div>
@endif
