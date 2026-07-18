<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAvailability extends Model
{
    use HasFactory;
    protected $table= 'booking_availability';
    //protected $fillable = [


    public function booking() {
        return $this->hasMany(Booking::class,'booking_availability_id');
    }

    public function day() {
        return $this->belongsTo(Day::class,'day_id');
    }

    public function availabilityStart() {
        return $this->belongsTo(Availability::class,'availability_start_id');
    }

    
    public function availabilityEnd() {
        return $this->belongsTo(Availability::class,'availability_end_id');
    }
    public function sessionType() {
        return $this->belongsTo(SessionTypes::class,'session_type_id');
    }

    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'booking_availability_id');
    }
}


