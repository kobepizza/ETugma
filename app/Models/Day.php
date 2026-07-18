<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $table = 'days';
    

    public function dayAvailability(){
        return $this->hasMany(DayAvailability::class, 'day_id');
    }


    public function bookingAvailability(){
        return $this->hasMany(BookingAvailability::class,'day_id');
    }
}
