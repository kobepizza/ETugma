<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $table = 'submissions';
   const UPDATED_AT = null;
   protected $fillable =['id',
    'submission',
    'submitted_at',
    'submission_status_id'
    ];

    public function submissionStatus()
   {
       return $this->belongsTo(SubmissionStatus::class, 'submission_status_id');
   }


   public function assessmentSubmissionGrade()
    {
        return $this->hasMany(AssessmentSubmissionGrade::class,'submission_id');
    }
}
