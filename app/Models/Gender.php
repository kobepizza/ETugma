<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table= 'genders';


    public function userProfile(){
        return $this->hasOne(UserProfile::class, 'gender_id');
    }


    public function child(){
        return $this->hasMany(Children::class,'gender_id');
    }

}
