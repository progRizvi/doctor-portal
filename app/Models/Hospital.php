<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'schedules' => 'array',
    ];
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'hospital_departments');
    }
}
