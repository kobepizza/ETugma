<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentSubmissionGrade extends Model
{
    use HasFactory;
    protected $table = 'assessment_submission_grade';
    
     public function assessment()
    {
        return $this->belongsTo(Assessment::class,'assessment_id');
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class,'submission_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
