<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentStatus extends Model
{
    use HasFactory;

    protected $table ='assessment_status';

    public function asssessment(){
        return $this->hasMany(Assessment::class,'assessment_status_id' );
    }
}
