<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id',
        'crypto_amount',
        'amount',
        'address',
        'pkey',
        'success',
        'transaction_receiver_id',
        'transaction_payer_id',
        'transaction_comment_payer_id',
        'transaction_comment_receiver_id',
        'received'
    ];
    public function token(){
        return $this->belongsTo(Token::class);
    }

}
