<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    protected $table= 'user_status';

    public function userProfile(){
        return $this->hasOne(UserProfile::class, 'user_status_id');
    }

}
