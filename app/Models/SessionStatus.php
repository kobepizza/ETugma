<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionStatus extends Model
{
    use HasFactory;

protected $table ="session_status";

    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'session_status_id');
    }
}
