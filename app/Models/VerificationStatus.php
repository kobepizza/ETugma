<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationStatus extends Model
{
    use HasFactory;

    protected $table='verification_status';

    public function tutor(){
        return $this->hasOne(Tutor::class ,'verification_status_id');
    }
}
