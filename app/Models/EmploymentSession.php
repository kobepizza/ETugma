<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentSession extends Model
{
    use HasFactory;

    protected $table ='employment_sessions';


    public function tutor(){
        return $this->hasMany(Tutor::class, 'employment_session_id');
    }


    public function sessionType(){
        return $this->belongsTo(SessionTypes::class, 'session_type_id');
    }

    public function employmentType(){
        return $this->belongsTo(EmploymentType::class, 'employment_type_id');
    }
}
