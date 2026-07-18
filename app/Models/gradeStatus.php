<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gradeStatus extends Model
{
    use HasFactory;

    
    protected $table = 'grade_status';

    public function grades(){
        return $this->hasMany(Grade::class);
    }
}
