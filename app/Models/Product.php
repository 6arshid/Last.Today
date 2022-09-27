<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'product_description',
        'product_source',
        'product_user_id',
        'product_slug',
        'product_nft',
        'product_owner_id',
        'product_uniqid',
        'product_morefilezip',
        'product_city',
        'product_country',
        'product_delivery'
    ];
}
