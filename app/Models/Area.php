<?php

namespace App\Models;

use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class, "district_id", "id");
    }
    public function doctors(){
        return $this->hasMany(Doctor::class, "area_id", "id");
    }
    public function hospitals(){
        return $this->hasMany(Hospital::class, "area_id", "id");
    }

    public function extraInfo()
    {
        return $this->hasMany(ExtraInfo::class);
    }
}
