<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function area()
    {
        return $this->belongsTo(Area::class);
    }
}