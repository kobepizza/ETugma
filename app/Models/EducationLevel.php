<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    use HasFactory;


    protected $table = 'education_level';


    public function tutorMain(){
        return $this->hasMany(TutorMain::class,'education_level_id');
    }


    
}
