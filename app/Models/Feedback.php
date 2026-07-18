<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';


    public function rating(){
        return $this->belongsTo(Rating::class, 'rating_id');
     }

     public function tutorSession(){
        return $this->belongsTo(TutorSession::class, 'tutor_sessions_id');
     }
}
