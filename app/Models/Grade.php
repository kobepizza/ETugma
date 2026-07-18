<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
     protected $table = 'grades';

     protected $fillable = [
        'feedback',
        'grade_status_id'
     ];
     public function mark()
    {
        return $this->belongsTo(Mark::class, 'mark_id');
    }
    public function gradeStatus()
    {
        return $this->belongsTo(gradeStatus::class, 'grade_status_id');
    }


    public function assessmentSubmissionGrade()
    {
        return $this->hasMany(AssessmentSubmissionGrade::class,'grade_id');
    }

}
