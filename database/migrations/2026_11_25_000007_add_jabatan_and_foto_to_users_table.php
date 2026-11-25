<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom profil ke tabel users:
     *
     * - jabatan : jabatan tekstual staf (cth: 'Staf Adm', 'Koord. Fasilitas').
     *             Berbeda dari kolom role ('admin'/'staf') yang mengatur hak akses.
     *             Ditampilkan di kartu PIC pada halaman katalog dan dashboard.
     *             Nullable karena akun Admin belum tentu punya jabatan operasional,
     *             dan data lama tidak perlu langsung diisi.
     *
     * - foto    : path file foto profil staf (avatar PIC).
     *             Ditampilkan sebagai gambar di kartu barang (foto_pic di frontend).
     *             Nullable karena foto bersifat opsional (terkait PBI-14 upload foto).
     *
     * Catatan: Kolom ini ditambahkan ke tabel users yang sudah ada data,
     * sehingga harus nullable atau memiliki default agar SQLite tidak error.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jabatan')->nullable()->after('unit_kerja_id');
            $table->string('foto')->nullable()->after('jabatan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['jabatan', 'foto']);
        });
    }
};
