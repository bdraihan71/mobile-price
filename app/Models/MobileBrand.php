<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileBrand extends Model
{
    use HasFactory, SoftDeletes;    

    public function mobileModels()
    {
        return $this->hasMany(MobileModel::class);
    }

}
