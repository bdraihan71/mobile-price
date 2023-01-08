<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;

    public function mobileModel()
    {
        return $this->belongsTo(MobileModel::class);
    }
}
