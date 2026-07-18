<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;

    protected $fillable =[
        'rate'
    ];

    protected $table = 'rates';

    
    public function yearLevel(){
        return $this->belongsTo(YearLevel::class, 'year_level_id');
    }

    public function sessionType(){
        return $this->belongsTo(SessionTypes::class,'session_type_id');
    }

    public function modality(){
        return $this->belongsTo(Modality::class,'modality_id');
    }


    public function booking()
    {
        return $this->hasMany(Booking::class, 'rates_id');
    }
}
