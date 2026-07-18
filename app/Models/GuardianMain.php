<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianMain extends Model
{
    use HasFactory;

    protected $table= 'guardian_main';



    public function preferenceLanguage()
    {
        return $this->belongsTo(PreferenceLanguage::class, 'preference_language_id');
    }

    public function child()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }


    
    public function booking()
    {
        return $this->hasMany(Booking::class, 'guardian_main_id');
    }

    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'guardian_main_id');
    }

    public function tutorSessions(){
        return $this->belongsTo(TutorSession::class,'guardian_main_id');
    }
}
