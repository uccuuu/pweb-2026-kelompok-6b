@extends('layouts.admin')

@section('title', 'Dashboard Inventaris - Inventra')

@section('content')

    @php
        $dataDashboard = require resource_path('views/data/admin/dashboard.php');

        $statistik = $dataDashboard['statistik'];
        $laporanKerusakan = $dataDashboard['laporanKerusakan'];
        $distribusiUnit = $dataDashboard['distribusiUnit'];
        $asetTerbaru = $dataDashboard['asetTerbaru'];
    @endphp

    <main class="w-full pt-24 min-h-[calc(100vh-100px)]">
        <div class="w-full max-w-none mx-auto px-4 lg:px-6 py-4">
            <div class="flex flex-col w-full pb-16">

                <!-- Top Command & Action Bar -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
                    <div>

                        <h1
                            class="font-headline-lg text-headline-lg lg:font-display-lg lg:text-display-lg text-on-surface tracking-tight">
                            Dashboard Inventaris
                        </h1>

                        <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mt-1">
                            Dashboard sebaran aset kantor, status penanggung jawab, dan pemantauan laporan kerusakan
                            terbaru.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <button type="button"
                            class="flex items-center gap-2.5 px-6 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-lg text-label-lg font-bold shadow-[0_8px_20px_-3px_rgba(103,112,0,0.25)] hover:brightness-105 active:scale-95 transition-all">
                            <span class="material-symbols-outlined text-[20px]">add_circle</span>
                            <span>Tambah Aset Baru</span>
                        </button>
                    </div>
                </div>

                {{-- Metric Summary Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-10">

                    @foreach ($statistik as $item)
                        <x-admin.metric-card
                            :ikon="$item['ikon']"
                            :warna-ikon="$item['warna_ikon']"
                            :judul="$item['judul']"
                            :jumlah="$item['jumlah']"
                            :satuan="$item['satuan']"
                            :warna-teks="$item['warna_teks'] === 'text-error' ? 'text-error' : 'text-on-surface'"
                        />
                    @endforeach

                </div>

                <!-- Main Content -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <x-admin.damage-report-list
                    :laporan-kerusakan="$laporanKerusakan"
                    :jumlah-baru="3"
                    :jumlah-belum-selesai="8"
                    :jumlah-ditampilkan="3"
                    :link-semua="url('/admin/laporan-kerusakan')"
                />

                    <!-- RIGHT COLUMN -->
                    <div class="lg:col-span-5 flex flex-col gap-6">

                        <x-admin.unit-distribution
                            :distribusi-unit="$distribusiUnit"
                            :total-barang="128"
                        />

                        <x-admin.new-assets
                            :aset-terbaru="$asetTerbaru"
                        />
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
