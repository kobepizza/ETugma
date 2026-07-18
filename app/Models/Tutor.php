<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;


    protected $table ='tutors';

    protected $fillable = ['verification_status_id','user_profile_id','employment_session_id'];

    public function userProfile(){
        return $this->belongsTo(UserProfile::class ,'user_profile_id');
    }


    public function employmentSession(){
        return $this->belongsTo(EmploymentSession::class ,'employment_session_id');
    }

    public function verificationStatus(){
        return $this->belongsTo(VerificationStatus::class ,'verification_status_id');
    }
}
