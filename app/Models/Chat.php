<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
    'chat_receiver_id','chat_sender_id', 'chat_message','chat_sender_ip','chat_sender_delete','chat_receiver_delete'
    ];
}


