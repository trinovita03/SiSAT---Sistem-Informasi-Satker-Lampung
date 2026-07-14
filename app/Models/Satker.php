<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
