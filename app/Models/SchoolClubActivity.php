<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClubActivity extends Model
{
    protected $guarded = [];
    protected $table = 'school_club_activities';
    //belongs to a school
    public function school(){
        return $this->belongsTo(School::class);
    }
    //belongs to a school club
    public function schoolClub(){
        return $this->belongsTo(SchoolClub::class);
    }
    //belongs to a club activity
    public function clubActivity(){
        return $this->belongsTo(ClubActivity::class);
    }
}
