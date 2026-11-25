<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKerusakan extends Model
{
    public const STATUS_BARU = 'Baru';
    public const STATUS_DITANDAI = 'Ditandai';

    protected $table = 'laporan_kerusakans';

    protected $fillable = [
        'barang_id',
        'user_id',
        'nama_pelapor',
        'deskripsi',
        'status',
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
     * Setiap laporan kerusakan terkait dengan satu barang.
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    /**
     * Pelapor jika berasal dari akun pengguna terdaftar (nullable untuk publik QR).
     */
    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
