<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementPriorityStatus extends Model
{
    use HasFactory;
    protected $table = "advertisement_priority_status";

    public function adverts(){
        return $this->hasMany(Advertisement::class, 'advertisement_priority_status_id', 'id');
    }
}
