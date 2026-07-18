<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentYearSubject extends Model
{
    use HasFactory;


    protected $table ='department_year_subjects';

    protected $fillable =[
        'department_id',
        'year_id',
        'subject_id',
        'lesson_title',
        'topics'
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function gradeLevel(){
        return $this->belongsTo(YearLevel::class, 'year_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }


    
    public function tutorMain(){
        return $this->hasMany(TutorMain::class,'department_year_subject_id');
    }

}
