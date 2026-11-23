
@extends('layouts.admin')

@section('title', 'Katalog Inventaris - Inventra')

@section('content')

@php
    // Mengambil data dari dashboard.php
    $dataDashboard = require resource_path('views/data/admin/dashboard.php');

    $barangs = $dataDashboard['asetTerbaru'] ?? [];

    $totalBarang = $dataDashboard['statistik'][0]['jumlah'] ?? count($barangs);

    // Mengambil daftar unit kerja untuk filter
    $daftarUnit = collect($barangs)
        ->pluck('lokasi')
        ->filter()
        ->unique()
        ->values();

    // Mengambil daftar jenis penggunaan
    $daftarJenis = collect($barangs)
        ->pluck('jenis')
        ->filter()
        ->unique()
        ->values();

    // Mengambil daftar kondisi
    $daftarKondisi = collect($barangs)
        ->pluck('kondisi')
        ->filter()
        ->unique()
        ->values();

    $lokasi = collect($barangs)
        ->pluck('lokasi')
        ->filter()
        ->unique()
        ->values()
        ->all();
@endphp

<main class="w-full pt-24 min-h-[calc(100vh-100px)]">
    <div class="mx-auto px-10 pt-1 pb-4">
        <div class="flex flex-col w-full pb-16">

            <!-- Top Control Bar -->
            <div class="flex flex-col gap-6 mb-8">

                <!-- Header Title & Search -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">

                    <div>
                        <h1 class="font-headline-lg text-headline-lg lg:font-display-lg lg:text-display-lg text-on-surface tracking-tight">
                            Daftar Inventaris
                        </h1>

                        <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mt-1">
                            Kelola dan pantau seluruh aset inventaris kantor.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">

                        <!-- Search -->
                        <form method="GET" action="{{ url()->current() }}"
                            class="relative flex items-center min-w-[320px] lg:w-96 bg-surface-container-lowest/90 backdrop-blur-md rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)] px-4 py-2.5 transition-all focus-within:ring-2 focus-within:ring-[#AFC7D0]">

                            <span class="material-symbols-outlined text-[20px] text-tertiary mr-2.5">
                                search
                            </span>

                            <input
                                name="search"
                                value="{{ request('search') }}"
                                class="bg-transparent border-none outline-none text-on-surface font-body-md text-body-md placeholder-tertiary w-full"
                                placeholder="Cari nama atau kode barang..."
                                type="text"
                            >
                        </form>

                        <!-- Add Button -->
                        <button type="button"
                            class="flex items-center gap-2 bg-primary-container text-on-primary-container px-5 py-2.5 rounded-full font-label-lg text-label-lg shadow-md hover:opacity-95 transition-transform hover:scale-[1.02] active:scale-[0.98]">

                            <span class="material-symbols-outlined text-[20px]">add</span>
                            <span>Tambah Barang</span>
                        </button>

                    </div>
                </div>

                <!-- Filter Strip -->
                <form method="GET" action="{{ url()->current() }}"
                    class="flex flex-wrap items-center justify-between gap-4 pr-4">

                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <!-- Dropdown Filters -->
                    <div class="flex items-center gap-2.5 flex-wrap pr-6">


                    <!-- Dropdown Filters -->
                    <div class="flex items-center gap-2.5 flex-wrap">

                        @php
                            $filters = [
                                [
                                    'name' => 'jenis_penggunaan',
                                    'label' => 'Semua Jenis Penggunaan',
                                    'options' => $daftarJenis,
                                    'selected' => request('jenis_penggunaan'),
                                ],
                                [
                                    'name' => 'unit_kerja',
                                    'label' => 'Semua Unit Kerja',
                                    'options' => $lokasi,
                                    'selected' => request('lokasi_kerja'),
                                ],
                                [
                                    'name' => 'kondisi',
                                    'label' => 'Semua Kondisi',
                                    'options' => $daftarKondisi,
                                    'selected' => request('kondisi'),
                                ],
                            ];
                        @endphp

                        @foreach ($filters as $filter)
                            <div class="relative custom-filter" data-filter>
                                <input
                                    type="hidden"
                                    name="{{ $filter['name'] }}"
                                    value="{{ $filter['selected'] }}"
                                >

                                <button
                                    type="button"
                                    class="filter-trigger flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-md pl-4 pr-3 py-2.5 rounded-full shadow-sm text-on-surface font-label-md text-label-md border-0 outline-none ring-0 focus:outline-none focus:ring-0 hover:bg-surface-container-low transition-colors"
                                    aria-expanded="false"
                                >
                                    <span class="filter-label">
                                        {{ $filter['selected'] ?: $filter['label'] }}
                                    </span>

                                    <span class="material-symbols-outlined filter-arrow text-[20px] text-secondary transition-transform duration-200">
                                        keyboard_arrow_down
                                    </span>
                                </button>

                                <div class="filter-options hidden absolute top-full left-0 mt-2 min-w-full w-max max-w-64 z-50 bg-surface-container-lowest rounded-2xl shadow-xl p-1.5">
                                    <button
                                        type="button"
                                        class="filter-option w-full text-left px-4 py-2.5 rounded-xl text-sm text-on-surface hover:bg-[#DCEBE7] hover:text-[#006A68] transition-colors"
                                        data-value=""
                                    >
                                        {{ $filter['label'] }}
                                    </button>

                                    @foreach ($filter['options'] as $option)
                                        <button
                                            type="button"
                                            class="filter-option w-full text-left px-4 py-2.5 rounded-xl text-sm text-on-surface hover:bg-[#DCEBE7] hover:text-[#006A68] transition-colors"
                                            data-value="{{ $option }}"
                                        >
                                            {{ $option }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>

            </div>


            <!-- Asset Grid -->
            <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse ($barangs as $barang)

                    <x-admin.asset-card :barang="$barang" />

                @empty

                    <div class="col-span-full bg-surface-container-lowest/80 rounded-lg p-12 text-center">

                        <div class="w-16 h-16 mx-auto rounded-full bg-surface-container flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-[32px] text-tertiary">
                                inventory_2
                            </span>
                        </div>

                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-2">
                            Barang Tidak Ditemukan
                        </h3>

                        <p class="font-body-md text-body-md text-tertiary">
                            Belum ada data inventaris yang tersedia.
                        </p>

                    </div>

                @endforelse

            </div>


        </div>
    </div>
</main>

<!-- QR Modal -->
<div
    class="fixed inset-0 z-[60] bg-inverse-surface/40 backdrop-blur-md hidden items-center justify-center p-4"
    id="qrModal"
>

    <div class="bg-surface-container-lowest rounded-lg max-w-md w-full p-6 shadow-2xl flex flex-col items-center text-center">

        <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-secondary mb-3">
            <span class="material-symbols-outlined text-[26px]">qr_code_2</span>
        </div>

        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-1" id="modalTitle">
            Rincian &amp; Label QR
        </h3>

        <p class="font-body-sm text-tertiary mb-5" id="modalSubtitle">
            Kode Barang
        </p>

        <!-- QR Placeholder -->
        <div class="p-4 bg-white rounded-DEFAULT shadow-inner mb-5">

            <svg class="w-48 h-48 text-on-surface" fill="currentColor" viewBox="0 0 100 100">

                <rect fill="none" height="28" rx="2" stroke="currentColor" stroke-width="6" width="28" x="5" y="5"></rect>
                <rect fill="currentColor" height="14" width="14" x="12" y="12"></rect>

                <rect fill="none" height="28" rx="2" stroke="currentColor" stroke-width="6" width="28" x="67" y="5"></rect>
                <rect fill="currentColor" height="14" width="14" x="74" y="12"></rect>

                <rect fill="none" height="28" rx="2" stroke="currentColor" stroke-width="6" width="28" x="5" y="67"></rect>
                <rect fill="currentColor" height="14" width="14" x="12" y="74"></rect>

                <rect fill="currentColor" height="16" width="8" x="42" y="10"></rect>
                <rect fill="currentColor" height="6" width="14" x="46" y="32"></rect>
                <rect fill="currentColor" height="6" width="24" x="10" y="44"></rect>
                <rect fill="currentColor" height="12" width="12" x="42" y="46"></rect>
                <rect fill="currentColor" height="8" width="24" x="66" y="44"></rect>
                <rect fill="currentColor" height="22" width="8" x="44" y="68"></rect>
                <rect fill="currentColor" height="8" width="14" x="62" y="68"></rect>
                <rect fill="currentColor" height="22" width="8" x="82" y="68"></rect>
                <rect fill="currentColor" height="6" width="12" x="62" y="86"></rect>

            </svg>

        </div>

        <div class="flex items-center gap-3 w-full">

            <button
                type="button"
                onclick="tutupModalQR()"
                class="flex-1 py-2.5 rounded-full bg-surface-container font-label-md text-label-md font-bold text-on-surface hover:bg-surface-container-high transition-colors"
            >
                Tutup
            </button>

            <button
                type="button"
                class="flex-1 py-2.5 rounded-full bg-secondary font-label-md text-label-md font-bold text-on-secondary shadow hover:opacity-95 transition-transform hover:scale-[1.02]"
            >
                Cetak Label
            </button>

        </div>

    </div>
</div>

<script>
    function bukaModalQR(button) {
        const modal = document.getElementById('qrModal');

        const nama = button.dataset.nama;
        const kode = button.dataset.kode;

        document.getElementById('modalTitle').textContent = nama;
        document.getElementById('modalSubtitle').textContent =
            'Kode Barang: ' + kode + ' • Terdaftar Resmi';

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function tutupModalQR() {
        const modal = document.getElementById('qrModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('qrModal').addEventListener('click', function(event) {
        if (event.target === this) {
            tutupModalQR();
        }
    });
</script>

@endsection
