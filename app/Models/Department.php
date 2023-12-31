<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'department_doctors');
    }
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_departments');
    }
    public function extraInfo()
    {
        return $this->hasMany(ExtraInfo::class);
    }
}
