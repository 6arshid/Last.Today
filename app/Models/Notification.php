<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_sender_id',
        'notification_reciver_id',
        'notification_type',
        'notification_everything_id',
        'notification_everything_type',
        'notification_read'
    ];
}
