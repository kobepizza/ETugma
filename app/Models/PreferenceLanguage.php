<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceLanguage extends Model
{
    use HasFactory;

    protected $table= 'preferences_languages';


    public function language()
    {
        return $this->hasMany(Language::class, 'id','language_id');
    }


    public function preference()
    {
        return $this->hasMany(Preference::class, 'id','preference_id');
    }
    

    public function guardianMain()
    {
        return $this->hasMany(GuardianMain::class, 'preference_language_id');
    }

    public function tutorMain()
    {
        return $this->hasMany(TutorMain::class, 'preference_language_id');
    }
}
