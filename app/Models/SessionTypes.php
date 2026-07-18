<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionTypes extends Model
{
    use HasFactory;


    protected $table ='session_types';


    public function employmentSession(){
        return $this->hasOne(EmploymentSession::class, 'session_type_id');
    }

    
    public function rate(){
        return $this->hasMany(Rates::class,'session_type_id');
    }

    public function dayAvailabilitySessionType(){
        return $this->hasMany(DayAvailabilitySessionType::class, 'session_type_id');
    }

    public function bookingAvailability(){
        return $this->hasMany(BookingAvailability::class,'booking_availability_id');
    }
    
}


