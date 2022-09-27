<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contract_address',
        'ticker',
        'icon',
        'active'
    ];
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
