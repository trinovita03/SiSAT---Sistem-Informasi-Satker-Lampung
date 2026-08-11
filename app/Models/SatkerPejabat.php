<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatkerPejabat extends Model
{
    protected $table = 'satker_pejabats';

    protected $fillable = [
        'satker_id',
        'jenis_jabatan',
        'nama',
        'nip',
        'jabatan',
        'pangkat_golongan',
        'no_wa',
        'email',
        'foto',
    ];

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
}