<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $table= 'modality';



    public function preference(){
        return $this->hasMany(Preference::class,'modality_id');
    }


    public function rate(){
        return $this->hasMany(Rates::class,'modality_id');
    }
    
}
