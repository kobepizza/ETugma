<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    //protected $table = 'notifications';
    protected $fillable = [
        'user_type',
        'user_id',
        'author',
        'title',
        'notification_type',
        'content',
        'seen',
        'booking_id',
        'tutoring_session_id'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id');
    }
    public function tutorsession(){
        return $this->belongsTo(TutorSession::class,'tutoring_session_id');
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id');
    }
    public function userType(){
        return $this->belongsTo(UserType::class,'user_type');
    }
}
