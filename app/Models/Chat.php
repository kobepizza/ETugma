<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function Clientsender()
    {
        return $this->belongsTo(UserProfile::class, 'sender_id', 'id');
    }

    // Relationship to get receiver profile
    public function Clientreceiver()
    {
        return $this->belongsTo(userProfile::class, 'receiver_id', 'id');
    }




    //
    public function tutorReceiverProfile()
    {
        return $this->belongsTo(UserProfile::class, 'receiver_id', 'id')
            ->select(['id', 'fname', 'lname', 'profile_pic']);
    }

    public function tutorSenderProfile()
    {
        return $this->belongsTo(Tutor::class, 'sender_id', 'id')
            ->select(['id', 'fname', 'lname', 'profile_pic']);
    }

    public function receiverSellerProfile()
    {
        return $this->belongsTo(Guardian::class, 'receiver_id', 'id')
            ->hasOne(UserProfile::class, 'id', 'user_profile_id')
            ->select(['id', 'fname', 'lname', 'profile_pic']);
    }

    public function senderSellerProfile()
    {
        return $this->belongsTo(Guardian::class, 'sender_id', 'id')
            ->hasOne(UserProfile::class, 'id', 'user_profile_id')
            ->select(['id', 'fname', 'lname', 'profile_pic']);
    }

    //
}
