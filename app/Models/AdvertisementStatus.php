<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementStatus extends Model
{
    use HasFactory;
    protected $table = "advertisement_status";

    public function adverts(){
        return $this->hasMany(Advertisement::class, 'advertisement_status_id', 'id');
    }
}
