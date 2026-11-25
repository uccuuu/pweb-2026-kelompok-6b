<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel laporan_kerusakans terpisah dari laporan_penemuans.
     *
     * Struktur kolom mengacu pada kebutuhan komponen frontend
     * damage-report-list.blade.php:
     * - barang_id    : FK ke barangs.id (cascadeOnDelete)
     * - user_id      : FK ke users.id, nullable (pelapor bisa Staf atau Publik QR)
     * - nama_pelapor : nama pelapor yang ditampilkan di daftar laporan
     * - deskripsi    : keterangan kerusakan barang
     * - status       : state laporan ('Baru', 'Ditandai'), default 'Baru'
     * - waktu_lapor  : waktu laporan dikirimkan
     */
    public function up(): void
    {
        Schema::create('laporan_kerusakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama_pelapor');
            $table->text('deskripsi');
            $table->string('status')->default('Baru');
            $table->timestamp('waktu_lapor')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kerusakans');
    }
};
