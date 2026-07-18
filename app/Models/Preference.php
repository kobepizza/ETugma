<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $table= 'preferences';
    protected $fillable = ['modality_id','teaching_style_id'];


    public function preferenceLanguage()
    {
        return $this->belongsTo(PreferenceLanguage::class, 'id','preference_id');
    }
   

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'preferences_languages');
    }


    public function teachingStyle()
    {
        return $this->belongsTo(TeachingStyle::class, 'teaching_style_id');
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class, 'modality_id');
    }


    public function availability()
    {
        return $this->belongsTo(Availability::class, 'availability_id');
    }
   
}
