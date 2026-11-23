
<header class="relative z-50 h-24 flex items-center justify-between px-6 lg:px-10">

    <!-- Logo Inventra -->
    <div class="flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-md px-5 py-2.5 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]">
        <span class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-surface">
            Inventra.
        </span>
    </div>

    <!-- Navigasi Admin -->
    <nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-2 bg-surface-container-lowest/80 backdrop-blur-md p-2 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]">

        <!-- Dashboard -->
        <a
            href="{{ url('/admin/dashboard') }}"
            aria-label="Dashboard"
            title="Dashboard"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/dashboard'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/dashboard'),
            ])
            @if(request()->is('admin/dashboard')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">grid_view</span>
        </a>

        <!-- Katalog Inventaris -->
        <a
            href="{{ url('/admin/katalog') }}"
            aria-label="Katalog Inventaris"
            title="Katalog Inventaris"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/katalog'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/katalog'),
            ])
            @if(request()->is('admin/katalog')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">inventory_2</span>
        </a>

        <!-- Kategori -->
        <a
            href="{{ url('/admin/kategori') }}"
            aria-label="Kategori"
            title="Kategori"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/kategori'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/kategori'),
            ])
            @if(request()->is('admin/kategori')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">label</span>
        </a>

        <!-- Unit Kerja -->
        <a
            href="{{ url('/admin/unit-kerja') }}"
            aria-label="Unit Kerja"
            title="Unit Kerja"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/unit-kerja'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/unit-kerja'),
            ])
            @if(request()->is('admin/unit-kerja')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">account_tree</span>
        </a>

        <!-- Pengguna / Staf -->
        <a
            href="{{ url('/admin/pengguna') }}"
            aria-label="Pengguna / Staf"
            title="Pengguna / Staf"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/pengguna'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/pengguna'),
            ])
            @if(request()->is('admin/pengguna')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">group</span>
        </a>

        <!-- Laporan Kerusakan -->
        <a
            href="{{ url('/admin/laporan-kerusakan') }}"
            aria-label="Laporan Kerusakan"
            title="Laporan Kerusakan"
            @class([
                'w-12 h-12 rounded-full flex items-center justify-center transition-all',
                'bg-secondary text-on-secondary shadow-md' => request()->is('admin/laporan-kerusakan'),
                'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high' => !request()->is('admin/laporan-kerusakan'),
            ])
            @if(request()->is('admin/laporan-kerusakan')) aria-current="page" @endif
        >
            <span class="material-symbols-outlined text-[22px]">report_problem</span>
        </a>

    </nav>

    <!-- Notifikasi dan Profil Admin -->
    <div class="flex items-center gap-3">

        <!-- Notifikasi -->
        <button
            type="button"
            aria-label="Notifikasi Kerusakan"
            class="relative w-12 h-12 rounded-full bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)] flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all"
        >
            <span class="material-symbols-outlined text-[22px]">notifications</span>

            <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-error rounded-full ring-2 ring-surface-container-lowest"></span>
        </button>

        <!-- Profil Admin -->
        <div class="flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-md pl-2 pr-4 py-2 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]">

            <img
                alt="Profile"
                class="w-8 h-8 rounded-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA7beWM3D79gVe6ZZap6osAAGD5noLuQPSkWuKBGPhC9cuZtDaco2LQX2VNA4XEUT58wds66N6s9r7HJrizJuYKGMRgBqPYjOalBF7Nl8N04P66us0xMBCcAwLtIAkE2rZxgRSCUnFu_Y-bc8cAn0wjqFr35y0G2s8ye1VSQ11isNH-FSzQqDct-8pNxaE8coJtqWMjRsHbYTrpu5r15XiZ2pZnN5SlL2JTES42Ak"
            >

            <div class="flex flex-col text-left">
                <span class="font-label-md text-label-md font-bold text-on-surface leading-tight">
                    Sari Administrator
                </span>

                <span class="font-label-sm text-label-sm text-on-surface-variant leading-tight">
                    Admin Unit Kerja
                </span>
            </div>

            <span class="material-symbols-outlined text-[18px] text-on-surface-variant ml-1">
                expand_more
            </span>

        </div>

    </div>

</header>
