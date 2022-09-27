<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    protected $fillable = [
        'feed_title', 'feed_url','lang', 'tags','user_id','image','type','category','XPATH'
    ];
}
