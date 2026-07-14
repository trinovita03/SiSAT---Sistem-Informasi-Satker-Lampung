<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kementerian extends Model
{
    public function satkers()
    {
        return $this->hasMany(Satker::class);
    }
}
