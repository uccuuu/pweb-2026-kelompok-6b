<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom status ke tabel laporan_penemuans:
     *
     * - status : status penanganan laporan oleh Admin.
     *            Nilai yang dipakai frontend: 'Baru', 'Ditandai'.
     *            Tombol aksi di damage-report-list berbeda tergantung nilai status,
     *            sehingga ini harus tersimpan di database, bukan hanya tampilan.
     *            Default 'Baru' karena setiap laporan masuk pertama kali belum
     *            diproses Admin.
     *
     * Nilai status yang direncanakan:
     *   'Baru'               → laporan baru masuk, belum ditinjau
     *   'Ditandai'           → sudah ditinjau Admin, sedang diproses
     *   'Selesai'            → penanganan selesai (untuk fitur lanjutan)
     */
    public function up(): void
    {
        Schema::table('laporan_penemuans', function (Blueprint $table) {
            $table->string('status')->default('Baru')->after('waktu_lapor');
        });
    }

    public function down(): void
    {
        Schema::table('laporan_penemuans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
