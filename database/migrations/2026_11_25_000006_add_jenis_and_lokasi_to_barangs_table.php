<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom yang dibutuhkan frontend ke tabel barangs:
     *
     * - jenis_penggunaan : 'Individu' atau 'Bersama'. Wajib ada karena dipakai
     *                      sebagai filter dropdown di halaman Katalog dan sebagai
     *                      badge + ikon di asset-card & new-assets component.
     *                      Default 'Individu' agar data lama tidak null.
     *
     * - lokasi_penempatan: lokasi fisik barang (cth: 'Ruang Staf Adm Lt. 2').
     *                      Berbeda dari lokasi_penemuan di laporan_penemuans.
     *                      Dipakai sebagai filter 'Unit Kerja' di katalog dan
     *                      ditampilkan di kartu barang. Nullable karena bisa
     *                      diisi kemudian saat CRUD.
     *
     * Catatan: SQLite mendukung ALTER TABLE ADD COLUMN dengan batasan — kolom
     * baru tidak boleh memiliki DEFAULT yang berupa ekspresi, hanya literal.
     * String literal dan NULL keduanya didukung.
     */
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('jenis_penggunaan')->default('Individu')->after('kondisi');
            $table->string('lokasi_penempatan')->nullable()->after('jenis_penggunaan');
        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn(['jenis_penggunaan', 'lokasi_penempatan']);
        });
    }
};
