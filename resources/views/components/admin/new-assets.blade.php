
@props([
    'asetTerbaru' => [],
])

<div class="bg-surface-container-lowest rounded-[28px] p-6 lg:p-7 shadow-[0_12px_32px_-4px_rgba(23,34,34,0.05)]">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface">
                <span class="material-symbols-outlined text-[20px]">
                    assignment_turned_in
                </span>
            </span>

            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">
                Aset Baru
            </h3>
        </div>

        <span class="px-2.5 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-bold">
            {{ count($asetTerbaru) }} Ditambahkan
        </span>
    </div>

    {{-- Daftar Aset --}}
    <div class="flex flex-col gap-4">
        @forelse ($asetTerbaru as $aset)
            <div class="p-4 rounded-2xl bg-surface-container-low/50 hover:bg-surface-container-low transition-all">

                {{-- PIC --}}
                <div class="flex items-center justify-between mb-3 bg-surface-container-lowest px-3 py-1.5 rounded-full shadow-sm gap-2">
                    <div class="flex items-center gap-2 min-w-0">
                        <img
                            class="w-6 h-6 rounded-full object-cover shrink-0"
                            src="{{ $aset['foto_pic'] }}"
                            alt="Foto {{ $aset['pic'] }}">

                        <span class="font-label-sm text-label-sm font-bold text-on-surface truncate">
                            {{ $aset['pic'] }}
                        </span>

                        <span class="font-label-sm text-label-sm text-tertiary whitespace-nowrap">
                            • {{ $aset['jabatan'] }}
                        </span>
                    </div>

                    <span class="px-2 py-0.5 rounded-full {{ $aset['jenis_class'] }} font-label-sm text-label-sm font-bold shrink-0">
                        {{ $aset['jenis'] }}
                    </span>
                </div>

                {{-- Informasi Aset --}}
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-2xl bg-surface-container-lowest flex items-center justify-center p-2 shadow-sm shrink-0">
                        <img
                            class="w-full h-full object-contain"
                            src="{{ $aset['foto_barang'] }}"
                            alt="{{ $aset['nama'] }}">
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-surface-container text-on-surface">
                                {{ $aset['kode'] }}
                            </span>

                            <span class="material-symbols-outlined text-[16px] text-tertiary">
                                qr_code_2
                            </span>
                        </div>

                        <h4 class="font-label-lg text-label-lg font-bold text-on-surface truncate">
                            {{ $aset['nama'] }}
                        </h4>

                        <p class="font-body-sm text-body-sm text-on-surface-variant truncate">
                            {{ $aset['lokasi'] }}
                        </p>
                    </div>
                </div>

                {{-- Aksi --}}
                <div class="mt-3 pt-2 flex items-center justify-between gap-2">
                    <span class="font-label-sm text-label-sm text-tertiary">
                        Kondisi: {{ $aset['kondisi'] }}
                    </span>

                    <button type="button"
                        class="px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container font-label-sm text-label-sm font-bold hover:brightness-105 transition-all">
                        Kelola Aset
                    </button>
                </div>
            </div>
        @empty
            <div class="p-8 rounded-2xl bg-surface-container-low text-center">
                <span class="material-symbols-outlined text-3xl text-tertiary">
                    inventory_2
                </span>

                <p class="font-body-sm text-body-sm text-tertiary mt-2">
                    Belum ada aset baru.
                </p>
            </div>
        @endforelse
    </div>

</div>
