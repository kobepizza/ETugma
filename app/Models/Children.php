<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;


    protected $table= 'children';
    protected $fillable = ['fname','lname','profile_pic','gender_id','bday','year_level_id','school','lrn'];

    public function age()
    {
        return Carbon::parse($this->bday)->age;
    }
    

    public function guardianMain(){
        return $this->hasMany(GuardianMain::class,'child_id');
    }


    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function yearLevel(){
        return $this->belongsTo(YearLevel::class,'year_level_id');
    }
}
