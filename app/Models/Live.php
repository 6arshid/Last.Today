<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $fillable = [
        'live_user_id',
        'live_title',
        'live_content',
        'live_description',
        'live_image',
        'live_source_name',
        'live_slug',
        'live_source_url'
    ];
}


