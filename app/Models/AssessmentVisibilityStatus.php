<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentVisibilityStatus extends Model
{
    use HasFactory;

    protected $table ='assessments_visibility_status';
    public function asssessment(){
        return $this->hasMany(Assessment::class,'assessment_visibility_status_id' );
    }
}
