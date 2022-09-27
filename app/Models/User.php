<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ref',
        'name',
        'email',
        'password',
        'verify',
        'username',
        'family',
        'about',
        'mobile',
        'avatar',
        'youtube',
        'instagram',
        'facebook',
        'telegram',
        'whatsapp',
        'domain',
        'twitch',
        'twitter',
        'kuaishou',
        'wechat',
        'linkedin',
        'skype',
        'github',
        'pinterest',
        'reddit',
        'address',
        'public_emai',
        'tronwallet',
        'paypal',
        'wikipedia',
        'qzone',
        'quora',
        'others',
        'url',
        'job',
        'color',
        'suspend',
        'is_admin',
        'social_id',
        'social_type',
        'verify',
        'bio',
        'uniqid',
        'pv',
        'first_register_ip',
        'metamask_login_wallet',
        'backgroundimage',
        'language'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
