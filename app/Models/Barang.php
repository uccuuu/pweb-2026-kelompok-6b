<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    public const JENIS_INDIVIDU = 'Individu';
    public const JENIS_BERSAMA = 'Bersama';

    protected $table = 'barangs';

    protected $fillable = [
        'kategori_id',
        'user_id',
        'unit_kerja_id',
        'kode_inventaris',
        'nama',
        'kondisi',
        'jenis_penggunaan',
        'lokasi_penempatan',
        'foto',
        'qr_token',
    ];

    // ─── Relasi ──────────────────────────────────────────────────────────────

    /**
     * Setiap barang termasuk dalam satu kategori.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Setiap barang ditugaskan ke satu staf penanggung jawab (PIC).
     * Menggunakan alias 'pic' agar lebih ekspresif saat dipakai di Controller/View.
     */
    public function pic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Setiap barang dimiliki oleh satu unit kerja.
     */
    public function unitKerja(): BelongsTo
    {
        return $this->belongsTo(UnitKerja::class);
    }

    /**
     * Satu barang dapat memiliki banyak laporan penemuan publik.
     */
    public function laporanPenemuans(): HasMany
    {
        return $this->hasMany(LaporanPenemuan::class);
    }

    /**
     * Satu barang dapat memiliki banyak laporan kerusakan.
     */
    public function laporanKerusakans(): HasMany
    {
        return $this->hasMany(LaporanKerusakan::class);
    }
}
