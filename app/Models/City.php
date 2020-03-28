<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tr_cities';

    protected $primaryKey = 'id_city';
    
    protected $fillable = [
        'province_id', 'name',
    ];
}
