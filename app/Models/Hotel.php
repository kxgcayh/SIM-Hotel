<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'tr_hotels';

    protected $primaryKey = 'id_hotel';
    
    protected $fillable = [
        'city_id', 'name',
    ];
}
