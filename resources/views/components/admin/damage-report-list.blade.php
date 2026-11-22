
@props([
    'laporanKerusakan' => [],
    'jumlahBaru' => 3,
    'jumlahBelumSelesai' => 8,
    'jumlahDitampilkan' => 3,
    'linkSemua' => '#',
])

<div class="lg:col-span-7 flex flex-col gap-6">
    <div class="bg-surface-container-lowest rounded-[28px] p-6 lg:p-8 shadow-[0_12px_32px_-4px_rgba(23,34,34,0.05)]">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-error-container/50 flex items-center justify-center text-error">
                    <span class="material-symbols-outlined text-[22px]">warning</span>
                </div>

                <div>
                    <div class="flex items-center gap-2">
                        <h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">
                            Laporan Kerusakan Terbaru
                        </h2>

                        <span class="px-2.5 py-0.5 rounded-full bg-error text-on-error font-label-sm text-label-sm font-bold">
                            {{ $jumlahBaru }} BARU
                        </span>
                    </div>

                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Inspeksi langsung pelaporan via QR Code staf & publik
                    </p>
                </div>
            </div>

            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-tertiary font-label-sm text-label-sm font-semibold self-start sm:self-auto">
                <span class="w-1.5 h-1.5 rounded-full bg-error animate-pulse"></span>
                Perlu Peninjauan Admin
            </span>
        </div>

        {{-- Daftar Laporan --}}
        <div class="flex flex-col gap-5">
            @forelse ($laporanKerusakan as $laporan)
                <div class="rounded-2xl p-5 bg-surface-container-low/60 hover:bg-surface-container-low transition-all">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-8 h-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-secondary shadow-sm">
                                <span class="material-symbols-outlined text-[18px]">{{ $laporan['ikon'] }}</span>
                            </span>

                            <div>
                                <h3 class="font-label-lg text-label-lg font-bold text-on-surface">
                                    {{ $laporan['barang'] }} ({{ $laporan['kode'] }})
                                </h3>

                                <div class="flex flex-wrap items-center gap-2 font-label-sm text-label-sm text-tertiary">
                                    <span>{{ $laporan['unit'] }}</span>
                                    <span>•</span>
                                    <span class="text-on-surface font-medium">
                                        Pelapor: {{ $laporan['pelapor'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 self-start sm:self-center">
                            <span class="px-2.5 py-1 rounded-full {{ $laporan['status_class'] }} font-label-sm text-label-sm font-bold">
                                {{ $laporan['status'] }}
                            </span>

                            <span class="font-label-sm text-label-sm text-tertiary">
                                {{ $laporan['waktu'] }}
                            </span>
                        </div>
                    </div>

                    <div class="bg-surface-container-lowest p-3.5 rounded-xl font-body-sm text-body-sm text-on-surface shadow-sm">
                        <p class="italic text-on-surface-variant">
                            "{{ $laporan['deskripsi'] }}"
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-3.5 pt-1">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px] text-tertiary">qr_code_scanner</span>

                            <span class="font-label-sm text-label-sm text-tertiary font-mono">
                                {{ $laporan['kode_qr'] }}
                            </span>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            @if ($laporan['status'] === 'Baru')
                                <button type="button"
                                    class="px-3.5 py-1.5 rounded-full bg-surface-container-highest hover:bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold transition-all">
                                    Tandai Sedang Diperbaiki
                                </button>

                                <button type="button"
                                    class="px-3.5 py-1.5 rounded-full bg-secondary text-on-secondary font-label-sm text-label-sm font-semibold shadow-sm hover:brightness-110 transition-all">
                                    Validasi Admin
                                </button>
                            @else
                                <button type="button"
                                    class="px-3.5 py-1.5 rounded-full bg-surface-container-highest hover:bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold transition-all">
                                    Lihat Riwayat
                                </button>

                                <button type="button"
                                    class="px-3.5 py-1.5 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm font-semibold shadow-sm hover:brightness-95 transition-all">
                                    Pergantian Sparepart
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 rounded-2xl bg-surface-container-low text-center">
                    <span class="material-symbols-outlined text-3xl text-tertiary">task_alt</span>
                    <p class="font-body-sm text-body-sm text-tertiary mt-2">
                        Belum ada laporan kerusakan.
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Footer --}}
        <div class="mt-6 pt-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <span class="font-label-md text-label-md text-on-surface-variant">
                Menampilkan {{ $jumlahDitampilkan }} dari {{ $jumlahBelumSelesai }} laporan yang belum terselesaikan
            </span>

            <a href="{{ $linkSemua }}"
                class="inline-flex items-center gap-2 font-label-md text-label-md font-bold text-secondary hover:text-on-secondary-container transition-colors">
                <span>Lihat Semua Laporan Kerusakan ({{ $jumlahBelumSelesai }})</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
    </div>
</div>
