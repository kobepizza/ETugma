<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $table = 'assessments';
   
  
   
   
    public function subject()
   {
       return $this->belongsTo(Subject::class, 'subject_id');
   }

   public function tutorSession()
   {
       return $this->belongsTo(TutorSession::class, 'tutor_sessions_id');
   }

   public function assessmentVisibilityStatus()
   {
       return $this->belongsTo(AssessmentVisibilityStatus::class, 'assessment_visibility_status_id');
   }
   
   public function assessmentStatus()
   {
       return $this->belongsTo(AssessmentStatus::class, 'assessment_status_id');
   }


   public function assessmentSubmissionGrade()
    {
        return $this->hasMany(AssessmentSubmissionGrade::class,'assessment_id');
    }
}
