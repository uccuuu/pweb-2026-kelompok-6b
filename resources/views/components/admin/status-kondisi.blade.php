
@props(['kondisi'])

@php
    $warnaKondisi = match ($kondisi) {
        'Baik', 'Siap Pakai' => 'bg-[#B5DEC5] text-[#145C35]',
        'Butuh Pemeliharaan', 'Pemeliharaan' => 'bg-[#F5D77E] text-[#765000]',
        'Rusak' => 'bg-[#EFB8B8] text-[#991F1F]',
        default => 'bg-surface-container-high text-on-surface-variant',
    };
@endphp

<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $warnaKondisi }}">
    {{ $kondisi }}
</span>
