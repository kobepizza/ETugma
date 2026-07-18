<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table ='transactions';



    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id');
    }

    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'transaction_id');
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
