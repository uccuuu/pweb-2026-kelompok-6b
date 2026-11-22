
@props([
    'distribusiUnit' => [],
    'totalBarang' => 128,
])

<div class="bg-surface-container-lowest rounded-[28px] p-6 lg:p-7 shadow-[0_12px_32px_-4px_rgba(23,34,34,0.05)]">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface">
                <span class="material-symbols-outlined text-[20px]">
                    account_tree
                </span>
            </span>

            <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">
                Distribusi per Unit Kerja
            </h3>
        </div>

        <span class="font-label-sm text-label-sm text-tertiary font-semibold">
            {{ $totalBarang }} Barang Total
        </span>
    </div>

    {{-- Daftar Distribusi --}}
    <div class="space-y-4">
        @forelse ($distribusiUnit as $unit)
            <div>
                <div class="flex justify-between items-center text-label-md font-label-md mb-1.5 gap-2">
                    <span class="font-semibold text-on-surface">
                        {{ $unit['nama'] }}
                    </span>

                    <span class="text-tertiary font-medium whitespace-nowrap">
                        {{ $unit['jumlah'] }} barang
                    </span>
                </div>

                <div class="w-full h-3 rounded-full bg-surface-container overflow-hidden">
                    <div
                        class="h-full {{ $unit['warna'] }} rounded-full"
                        style="width: {{ $unit['jumlah'] }}%">
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center font-body-sm text-body-sm text-tertiary py-5">
                Belum ada data distribusi unit kerja.
            </p>
        @endforelse
    </div>

</div>
