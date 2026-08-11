<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    public function pejabat()
    {
        return $this->hasMany(SatkerPejabat::class);
    }

    public function kementerian()
    {
        return $this->belongsTo(Kementerian::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
