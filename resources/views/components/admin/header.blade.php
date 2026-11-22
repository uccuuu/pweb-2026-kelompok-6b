
<header class="relative z-50 h-24 flex items-center justify-between px-6 lg:px-10">

    <!-- Logo Inventra -->
    <div class="flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-md px-5 py-2.5 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]">
        <span class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-surface">
            Inventra.
        </span>
    </div>

    <!-- Navigasi Admin -->
    <nav
        class="fixed top-6 left-1/2 -translate-x-1/2 z-50 hidden md:flex items-center gap-2 bg-surface-container-lowest/80 backdrop-blur-md p-2 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]"
    >
        <a
            aria-current="page"
            class="w-12 h-12 rounded-full flex items-center justify-center transition-all bg-secondary text-on-secondary shadow-md"
            data-path="dashboard"
            href="#"
            title="Dashboard"
        >
            <span class="material-symbols-outlined text-[22px]">grid_view</span>
        </a>

        <a
            class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high w-12 h-12 rounded-full flex items-center justify-center transition-all"
            data-path="katalog"
            href="#"
            title="Katalog Inventaris"
        >
            <span class="material-symbols-outlined text-[22px]">inventory_2</span>
        </a>

        <a
            class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high w-12 h-12 rounded-full flex items-center justify-center transition-all"
            data-path="kategori"
            href="#"
            title="Kategori"
        >
            <span class="material-symbols-outlined text-[22px]">label</span>
        </a>

        <a
            class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high w-12 h-12 rounded-full flex items-center justify-center transition-all"
            data-path="unit-kerja"
            href="#"
            title="Unit Kerja"
        >
            <span class="material-symbols-outlined text-[22px]">account_tree</span>
        </a>

        <a
            class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high w-12 h-12 rounded-full flex items-center justify-center transition-all"
            data-path="pengguna"
            href="#"
            title="Pengguna / Staf"
        >
            <span class="material-symbols-outlined text-[22px]">group</span>
        </a>

        <a
            class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high w-12 h-12 rounded-full flex items-center justify-center transition-all"
            data-path="laporan-kerusakan"
            href="#"
            title="Laporan Kerusakan"
        >
            <span class="material-symbols-outlined text-[22px]">report_problem</span>
        </a>
    </nav>

    <!-- Notifikasi dan Profil Admin -->
    <div class="flex items-center gap-3">

        <button
            type="button"
            aria-label="Notifikasi Kerusakan"
            class="relative w-12 h-12 rounded-full bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)] flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all"
        >
            <span class="material-symbols-outlined text-[22px]">notifications</span>
            <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-error rounded-full ring-2 ring-surface-container-lowest"></span>
        </button>

        <div class="flex items-center gap-3 bg-surface-container-lowest/90 backdrop-blur-md pl-2 pr-4 py-2 rounded-full shadow-[0_12px_32px_-4px_rgba(23,34,34,0.06)]">

            <img
                alt="Profile"
                class="w-8 h-8 rounded-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA7beWM3D79gVe6ZZap6osAAGD5noLuQPSkWuKBGPhC9cuZtDaco2LQX2VNA4XEUT58wds66N6s9r7HJrizJuYKGMRgBqPYjOalBF7Nl8N04P66us0xMBCcAwLtIAkE2rZxgRSCUnFu_Y-bc8cAn0wjqFr35y0G2s8ye1VSQ11isNH-FSzQqDct-8pNxaE8coJtqWMjRsHbYTrpu5r15XiZ2pZnN5SlL2JTES42Ak"
            />

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
