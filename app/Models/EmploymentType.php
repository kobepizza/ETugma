<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    use HasFactory;

    protected $table ='employment_type';

    public function employmentSession(){
        return $this->hasOne(EmploymentSession::class, 'employment_type_id');
    }
}
