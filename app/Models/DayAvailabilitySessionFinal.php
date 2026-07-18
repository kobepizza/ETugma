<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayAvailabilitySessionFinal extends Model
{
    use HasFactory;


    protected $table='day_availability_session_final';


    public function tutorMain(){
        return $this->belongsTo(TutorMain::class,'tutor_main_id');
    }

    public function day(){
        return $this->belongsTo(Day::class,'day_id');
    }

    public function availabilityStart(){
        return $this->belongsTo(Availability::class,'availability_start_id');
    }

    public function availabilityEnd(){
        return $this->belongsTo(Availability::class,'availability_end_id');
    }

    public function sessionType(){
        return $this->belongsTo(SessionTypes::class,'session_type_id');
    }



    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'day_availability_session_type_final_id');
    }

    
    
}
