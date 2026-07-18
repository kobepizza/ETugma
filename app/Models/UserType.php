<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table= 'user_types';

    public function userProfile(){
        return $this->hasOne(UserProfile::class, 'user_type_id');
    }
    public function notification(){
        return $this->hasMany(Notification::class, 'user_type');
    }
}
