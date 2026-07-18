<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'title',
        'image',
        'start_date',
        'end_date',
        'advertisement_status_id',
        'advertisement_priority_status_id'
    ];

    public function advertStatus(){
        return $this->belongsTo(AdvertisementStatus::class,'advertisement_status_id');
    }
    public function priorityStatus(){
        return $this->belongsTo(AdvertisementPriorityStatus::class, 'advertisement_priority_status_id');
    }
}
