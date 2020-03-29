<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'tr_rooms';

    protected $primaryKey = 'id_room';
    
    protected $fillable = [
        'hotel_id', 'name',
    ];

    public $timestamps = false;
}
