<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['published_at'];

    public function network()
    {
        return $this->hasOne(Network::class);
    }

    public function launch()
    {
        return $this->hasOne(Launch::class);
    }

    public function body()
    {
        return $this->hasOne(Body::class);
    }

    public function display()
    {
        return $this->hasOne(Display::class);
    }

    public function platform()
    {
        return $this->hasOne(Platform::class);
    }

    public function mainCamera()
    {
        return $this->hasOne(MainCamera::class);
    }

    public function selfieCamera()
    {
        return $this->hasOne(SelfieCamera::class);
    }

    public function memory()
    {
        return $this->hasOne(Memory::class);
    }

    public function sound()
    {
        return $this->hasOne(Sound::class);
    }

    public function connectivity()
    {
        return $this->hasOne(Connectivity::class);
    }

    public function feature()
    {
        return $this->hasOne(Feature::class);
    }

    public function battery()
    {
        return $this->hasOne(Battery::class);
    }

    public function mobileBrand()
    {
        return $this->belongsTo(MobileBrand::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
