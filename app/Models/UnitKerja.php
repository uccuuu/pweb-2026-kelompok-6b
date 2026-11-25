<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitKerja extends Model
{
    protected $table = 'unit_kerjas';

    protected $fillable = [
        'nama',
        'keterangan',
    ];

    // ─── Relasi ──────────────────────────────────────────────────────────────

    /**
     * Satu unit kerja memiliki banyak pengguna (staf).
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Satu unit kerja memiliki banyak barang secara langsung.
     */
    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
