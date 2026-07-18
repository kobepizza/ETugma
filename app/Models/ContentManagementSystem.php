<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentManagementSystem extends Model
{
    use HasFactory;
    protected $table = 'cms';
    protected $fillable = [
        'content',
        'image',
        'created_at'
    ];
}
