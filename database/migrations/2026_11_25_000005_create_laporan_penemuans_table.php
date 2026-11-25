<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel laporan_penemuans untuk menyimpan laporan penemuan barang oleh publik.
     *
     * Publik tidak memiliki akun — data penemu (nama, lokasi, keterangan) disimpan
     * langsung di tabel ini sebagai teks biasa, bukan FK ke tabel users.
     *
     * - barang_id        : FK ke barangs.id. Jika barang dihapus, laporan ikut dihapus (cascade).
     * - nama_penemu      : nama yang diisi oleh penemu saat mengisi form (tanpa login)
     * - lokasi_penemuan  : deskripsi lokasi ditemukan (teks bebas)
     * - keterangan       : pesan/keterangan tambahan dari penemu
     * - waktu_lapor      : waktu saat laporan dikirimkan; default ke waktu sekarang
     */
    public function up(): void
    {
        Schema::create('laporan_penemuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->cascadeOnDelete();
            $table->string('nama_penemu');
            $table->string('lokasi_penemuan');
            $table->text('keterangan')->nullable();
            $table->timestamp('waktu_lapor')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penemuans');
    }
};
