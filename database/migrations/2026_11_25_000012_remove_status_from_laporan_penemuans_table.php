<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menghapus kolom status dari tabel laporan_penemuans.
     *
     * Sesuai keputusan tim dan Product Backlog, laporan_penemuans khusus
     * untuk laporan penemuan publik (tanpa status persetujuan/tindak lanjut).
     * Kebutuhan status dipindahkan ke tabel laporan_kerusakans yang terpisah.
     */
    public function up(): void
    {
        Schema::table('laporan_penemuans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_penemuans', function (Blueprint $table) {
            $table->string('status')->default('Baru')->after('waktu_lapor');
        });
    }
};
