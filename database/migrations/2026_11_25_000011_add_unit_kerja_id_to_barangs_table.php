<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan relasi langsung unit_kerja_id pada tabel barangs -> unit_kerjas.id.
     *
     * Unit kerja barang berdiri sendiri, terpisah dari user_id (PIC) dan
     * lokasi_penempatan (lokasi fisik ruangan).
     *
     * Dibuat nullable agar aman pada ALTER TABLE di SQLite tanpa nilai default
     * unit_kerja_id yang belum tentu ada, serta menggunakan restrictOnDelete()
     * agar unit kerja yang masih memiliki barang tidak dapat dihapus sembarangan.
     */
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->foreignId('unit_kerja_id')
                ->nullable()
                ->after('user_id')
                ->constrained('unit_kerjas')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['unit_kerja_id']);
            $table->dropColumn('unit_kerja_id');
        });
    }
};
