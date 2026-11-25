<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel barangs sebagai tabel inti inventaris.
     *
     * Kolom penting:
     * - kategori_id    : FK ke kategoris.id
     * - user_id        : FK ke users.id — menunjuk staf penanggung jawab (PIC),
     *                    bukan pemilik pribadi. Nullable agar barang bisa didaftarkan
     *                    sebelum PIC ditetapkan.
     * - kode_inventaris: kode unik per barang (contoh: INV-2026-001)
     * - kondisi        : nilai terbatas: Baik, Butuh Pemeliharaan, Rusak
     * - foto           : path file foto, nullable
     * - qr_token       : token acak unik untuk membentuk URL publik QR Code.
     *                    Hanya menyimpan token, bukan data pribadi.
     *
     * Catatan SQLite: constrained() pada FK menggunakan onDelete('restrict')
     * secara default, yang kompatibel dengan SQLite.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('kode_inventaris')->unique();
            $table->string('nama');
            $table->string('kondisi')->default('Baik');
            $table->string('foto')->nullable();
            $table->string('qr_token')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
