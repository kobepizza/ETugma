<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingStyle extends Model
{
    use HasFactory;

    protected $table= 'teaching_style';


    public function preference(){
        return $this->hasMany(Preference::class,'teaching_style_id');
    }
    
}
