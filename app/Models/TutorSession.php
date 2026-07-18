<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorSession extends Model
{
    use HasFactory;


    protected $table ="tutor_sessions";
    
    protected $fillable = ['session_status_id'];

    public function tutorMain(){
        return $this->belongsTo(TutorMain::class,'tutor_main_id');
    }

    public function guardianMain(){
        return $this->belongsTo(GuardianMain::class,'guardian_main_id');
    }
    public function guardianMains(){
        return $this->hasMany(GuardianMain::class,'guardian_main_id');
    }

    public function bookingAvailability(){
        return $this->belongsTo(BookingAvailability::class,'booking_availability_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id');
    }

    public function sessionStatus(){
        return $this->belongsTo(SessionStatus::class,'session_status_id');
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }

    public function assessment(){
        return $this->hasMany(Assessment::class,'tutor_sessions_id' );
    }

    public function feedback(){
        return $this->hasMany(Feedback::class, 'tutor_sessions_id');
     }

}
