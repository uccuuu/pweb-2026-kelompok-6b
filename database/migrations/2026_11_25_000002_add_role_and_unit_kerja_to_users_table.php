<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambahkan kolom role dan unit_kerja_id ke tabel users yang sudah ada.
     * Migration lama (create_users_table) tidak diubah karena sudah berstatus Ran.
     *
     * - role: hanya boleh 'admin' atau 'staf'. Default 'staf' agar registrasi biasa
     *         tidak otomatis menjadi Admin.
     * - unit_kerja_id: nullable karena akun Admin tidak wajib terikat unit kerja.
     *
     * Catatan SQLite: SQLite tidak mendukung penambahan FK lewat ALTER TABLE
     * setelah tabel sudah ada data. Oleh karena itu FK unit_kerja_id didefinisikan
     * sebagai unsignedBigInteger biasa (tanpa constrained()) dan constraint-nya
     * dikelola di level aplikasi (Eloquent relationship). Ini kompatibel dengan
     * SQLite dan MySQL/PostgreSQL sekaligus.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('staf')->after('password');
            $table->unsignedBigInteger('unit_kerja_id')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'unit_kerja_id']);
        });
    }
};
