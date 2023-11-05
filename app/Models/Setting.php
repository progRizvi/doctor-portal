<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getLogoAttribute($value): string|UrlGenerator|Application
    {
        if($value){
            return Storage::url('setting/'.$value);
        }
        return url('images/user.jpg');
    }
}
