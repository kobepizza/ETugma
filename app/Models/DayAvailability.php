<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayAvailability extends Model
{
    use HasFactory;

    protected $table = 'day_availability';


    public function day(){
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function availability(){
        return $this->belongsTo(Availability::class, 'availability_id');
    }


    
}
