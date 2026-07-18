<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
{
    use HasFactory;
    protected $table = 'year_level';
    



    public function departmentYearSubject(){
        return $this->hasMany(DepartmentYearSubject::class, 'year_id');
    }


    public function child(){
        return $this->hasMany(Children::class,'year_level_id');
    }


    public function rate(){
        return $this->hasMany(Rates::class,'year_level_id');
    }
}
