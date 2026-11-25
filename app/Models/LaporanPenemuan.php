<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanPenemuan extends Model
{
    protected $table = 'laporan_penemuans';

    protected $fillable = [
        'barang_id',
        'nama_penemu',
        'lokasi_penemuan',
        'keterangan',
        'waktu_lapor',
    ];

    protected function casts(): array
    {
        return [
            'waktu_lapor' => 'datetime',
        ];
    }

    // ─── Relasi ──────────────────────────────────────────────────────────────

    /**
     * Setiap laporan terkait dengan satu barang.
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
