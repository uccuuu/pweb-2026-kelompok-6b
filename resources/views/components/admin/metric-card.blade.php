@props([
    'ikon',
    'warnaIkon',
    'judul',
    'jumlah',
    'satuan',
    'warnaTeks' => 'text-on-surface',
])

<div class="bg-surface-container-lowest rounded-[28px] p-6 shadow-[0_12px_32px_-4px_rgba(23,34,34,0.05)] flex flex-col justify-between relative overflow-hidden group hover:translate-y-[-2px] transition-all">

    <div class="flex items-start justify-between">
        <div class="w-12 h-12 rounded-2xl {{ $warnaIkon }} flex items-center justify-center">
            <span class="material-symbols-outlined text-[26px]">
                {{ $ikon }}
            </span>
        </div>
    </div>

    <div class="mt-5">
        <span class="font-label-md text-label-md text-tertiary">
            {{ $judul }}
        </span>

        <div class="flex items-baseline gap-2 mt-1">
            <span class="font-display-lg text-display-lg font-bold {{ $warnaTeks }}">
                {{ $jumlah }}
            </span>

            <span class="font-label-sm text-label-sm text-tertiary font-semibold">
                {{ $satuan }}
            </span>
        </div>
    </div>

</div>
