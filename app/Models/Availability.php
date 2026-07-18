<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $table= 'availability';



    public function dayAvailability(){
        return $this->hasMany(DayAvailability::class, 'availability_id');
    }

    public function dayAvailabilitySessionFinalStart(){
        return $this->hasMany(DayAvailabilitySessionFinal::class,'availability_start_id');
    }

    public function dayAvailabilitySessionFinalEnd(){
        return $this->hasMany(DayAvailabilitySessionFinal::class,'availability_end_id');
    }

    
    public function bookingAvailabilityStart(){
        return $this->hasMany(BookingAvailability::class,'availability_start_id');
    }

    public function bookingAvailabilityEnd(){
        return $this->hasMany(BookingAvailability::class,'availability_end_id');
    }
}
