
@props(['barang'])

@php
    $jenisIndividu = strtolower($barang['jenis'] ?? '') === 'individu';

    $fotoBarang = $barang['foto_barang'] ?? null;
    $fotoPic = $barang['foto_pic'] ?? null;

    $namaBarang = $barang['nama'] ?? 'Nama Barang';
    $kodeBarang = $barang['kode'] ?? '-';
    $namaPic = $barang['pic'] ?? '-';
    $lokasi = $barang['lokasi'] ?? '-';
    $kondisi = $barang['kondisi'] ?? '-';
@endphp

<!-- Combined PIC & Asset Card -->
<div class="bg-surface-container-lowest rounded-lg p-5 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.02),0_20px_25px_-5px_rgba(59,157,155,0.06)] flex flex-col justify-between transition-transform duration-300 hover:-translate-y-1">

    <!-- PIC Profile -->
    <div class="flex items-center justify-between bg-surface-container-lowest/90 backdrop-blur-md pl-2 pr-3 py-2 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.05)] mb-5">

        <div class="flex items-center gap-2.5 min-w-0">

            @if ($fotoPic)
                <img
                    src="{{ $fotoPic }}"
                    alt="{{ $namaPic }}"
                    class="w-10 h-10 rounded-full object-cover shrink-0"
                >
            @else
                <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-tertiary">person</span>
                </div>
            @endif

            <div class="flex flex-col min-w-0">
                <span class="font-label-md text-label-md font-bold text-on-surface truncate">
                    {{ $namaPic }}
                </span>
            </div>

        </div>

        <button
            type="button"
            class="w-8 h-8 rounded-full bg-surface-container-low flex items-center justify-center text-tertiary hover:text-on-surface transition-colors shrink-0"
            title="edit"
        >
            <span class="material-symbols-outlined text-[16px]">edit</span>
        </button>

    </div>

    <!-- Main Asset Content -->
    <div class="flex flex-col flex-1">

        <!-- Metadata -->
        <div class="flex items-center gap-1.5 flex-wrap mb-4">

            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-tertiary-container font-label-sm text-label-sm font-semibold text-secondary">
                <span class="material-symbols-outlined text-[12px]">qr_code</span>
                {{ $kodeBarang }}
            </span>

        </div>

        <!-- Asset Image -->
        <div class="relative w-full h-48 rounded-DEFAULT bg-[#F8FAFA] flex items-center justify-center overflow-hidden mb-4 group">

            @if ($fotoBarang)
                <img
                    src="{{ $fotoBarang }}"
                    alt="{{ $namaBarang }}"
                    class="w-4/5 h-4/5 object-contain transition-transform duration-300 group-hover:scale-105"
                >
            @else
                <span class="material-symbols-outlined text-[56px] text-tertiary">
                    inventory_2
                </span>
            @endif

            <span class="absolute top-2.5 left-2 rounded-full font-label-sm text-label-sm font-bold">
                <x-admin.status-kondisi :kondisi="$barang['kondisi']" />
            </span>

        </div>

        <!-- Asset Title -->
        <div class="flex items-start justify-between gap-2 mb-4">

            <div class="min-w-0">
                <h2 class="font-headline-sm text-headline-sm font-bold text-on-surface leading-tight mt-0.5">
                    {{ $namaBarang }}
                </h2>

            </div>
        </div>

        <!-- Usage Type -->
        <div class="flex items-center justify-between p-2.5 rounded-DEFAULT bg-surface-container-low mb-2">

            <div class="flex items-center gap-2.5 min-w-0">

                <div class="w-8 h-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-secondary shrink-0">
                    <span class="material-symbols-outlined text-[18px]">
                        {{ $jenisIndividu ? 'person' : 'groups' }}
                    </span>
                </div>

                <div class="flex flex-col min-w-0">
                    <span class="font-label-sm text-label-sm text-tertiary">
                        Jenis Penggunaan
                    </span>

                    <span class="font-label-md text-label-md font-bold text-on-surface truncate">
                        {{ $jenisIndividu ? 'Penggunaan Individu' : 'Penggunaan Bersama' }}
                    </span>
                </div>

            </div>

        </div>

        <!-- Location -->
        <div class="flex items-center justify-between p-2.5 rounded-DEFAULT bg-surface-container-low mb-5">

            <div class="flex items-center gap-2.5 min-w-0">

                <div class="w-8 h-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-secondary shrink-0">
                    <span class="material-symbols-outlined text-[18px]">domain</span>
                </div>

                <div class="flex flex-col min-w-0">
                    <span class="font-label-sm text-label-sm text-tertiary">
                        Lokasi
                    </span>

                    <span class="font-label-md text-label-md font-bold text-on-surface truncate">
                        {{ $lokasi }}
                    </span>
                </div>

            </div>

        </div>

    </div>

    <!-- QR Button -->
    <button
        type="button"
        class="w-full py-3 px-4 rounded-full bg-primary-container text-on-primary-fixed font-label-lg text-label-lg font-bold shadow-sm hover:brightness-95 transition-all flex items-center justify-center gap-2"
        onclick="bukaModalQR(this)"
        data-nama="{{ $namaBarang }}"
        data-kode="{{ $kodeBarang }}"
    >
        <span class="material-symbols-outlined text-[18px]">qr_code_2</span>
        <span>Lihat &amp; Cetak QR</span>
    </button>

</div>
