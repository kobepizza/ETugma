<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorMain extends Model
{
    use HasFactory;

    protected $table ='tutor_main';


    public function preferenceLanguage()
    {
        return $this->belongsTo(PreferenceLanguage::class, 'preference_language_id');
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
    public function requirement()
    {
        return $this->belongsTo(Requirements::class, 'requirements_id');
    }

    public function departmentYearSubject(){
        return $this->belongsTo(DepartmentYearSubject::class, 'department_year_subject_id');
    }

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'credential_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'tutor_main_id');
    }


    public function dayAvailabilitySessionTypeFinal(){
        return $this->hasMany(DayAvailabilitySessionFinal::class, 'tutor_main_id');
    }

    public function tutorSession(){
        return $this->hasMany(TutorSession::class,'tutor_main_id');
    }


    
}


