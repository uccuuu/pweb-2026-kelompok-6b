<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Memperbarui aturan onDelete pada foreign key barangs.user_id dari
     * SET NULL menjadi RESTRICT.
     *
     * Tujuannya agar akun staf yang masih menjadi PIC barang tidak bisa
     * dihapus begitu saja dan menyebabkan barang kehilangan PIC tanpa
     * penanganan/pengalihan PIC terlebih dahulu.
     * Kolom user_id tetap nullable untuk mendukung barang Penggunaan Bersama
     * yang mungkin tidak terikat pada satu staf spesifik.
     */
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });
    }
};
