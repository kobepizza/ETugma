<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;


    protected $table= 'languages';



    public function preferenceLanguage()
    {
        return $this->belongsTo(PreferenceLanguage::class, 'id','language_id');
    }



    public function preferences()
    {
        return $this->belongsToMany(Preference::class, 'preferences_languages');
    }
    
}
