<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan foreign key constraint pada users.unit_kerja_id -> unit_kerjas.id.
     *
     * Pada Laravel 12 dengan SQLite (3.54.0), Schema::table() dengan foreign()
     * otomatis menjalankan table rebuild yang aman (membuat tabel sementara,
     * menyalin seluruh data, mempertahankan kolom bawaan Laravel, unique index
     * users_email_unique, dan primary key autoincrement).
     *
     * Menggunakan restrictOnDelete() agar unit kerja yang masih memiliki user
     * tidak dapat dihapus secara tidak sengaja di level database.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('unit_kerja_id')
                ->references('id')
                ->on('unit_kerjas')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['unit_kerja_id']);
        });
    }
};
