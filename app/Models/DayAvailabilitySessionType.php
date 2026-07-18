<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayAvailabilitySessionType extends Model
{
    use HasFactory;

    protected $table ='day_availability_session_type';

    public function dayAvailability(){
        return $this->belongsTo(DayAvailability::class, 'day_availability_id');
    }

    public function sessionType(){
        return $this->belongsTo(SessionTypes::class, 'session_type_id');
    }

    public function booking(){
        return $this->hasMany(Booking::class, 'day_availability_session_type_id');
    }
    public function tutorSession(){
        return $this->hasMany(TutorSession::class, 'day_availability_session_type_id');
    }


    public function dayAvailabilitySessionTypeFinal(){
        return $this->hasMany(DayAvailabilitySessionFinal::class, 'day_availability_session_type_id');
    }

}
