<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table= 'guardians';


    public function userProfile(){
        return $this->belongsTo(UserProfile::class, 'user_profile_id');
    }

    public function relation(){
        return $this->belongsTo(relation::class, 'relation_id');
    }

    public function guardianMain(){
        return $this->hasMany(GuardianMain::class,'guardian_id');
    }
}
