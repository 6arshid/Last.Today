<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_type',
        'article_title',
        'article_content',
        'article_image',
        'article_slug',
        'article_user_id',
        'article_user_ip',
        'article_lang'
    ];
}
