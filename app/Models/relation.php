<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relation extends Model
{
    use HasFactory;

    protected $table = 'relation';


    public function guardian(){
        return $this->hasMany(UserProfile::class, 'relation_id');
    }


}
