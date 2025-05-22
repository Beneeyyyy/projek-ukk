<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PKL extends Model
{
    protected $table = 'p_k_l_s';

    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai',
    ];

    /**
     * Relasi ke model Siswa
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Relasi ke model Industri
     */
    public function industri(): BelongsTo
    {
        return $this->belongsTo(Industri::class);
    }

    /**
     * Relasi ke model DataGuru
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(DataGuru::class, 'guru_id');
    }
}
