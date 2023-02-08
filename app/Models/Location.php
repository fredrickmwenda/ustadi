<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = [];

    //a school has one location
    public function school()
    {
        return $this->hasOne(School::class);
    }
      
    //A mentor has one location
    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }
}
