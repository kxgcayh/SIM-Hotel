<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $table = 'ms_users';

    protected $primaryKey = 'id_user';
    
    protected $fillable = [
        'name', 'username', 'telp', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
         parent::boot();
         self::creating(function($model){
             $model->id_user = self::generateUuid();
         });
    }

    public static function generateUuid()
    {
         return Uuid::generate();
    }
}
