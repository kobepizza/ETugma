<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    protected $table = 'requirements';


    public function tutorMain(){
        return $this->hasMany(TutorMain::class,'requirements_id');
    }
}
