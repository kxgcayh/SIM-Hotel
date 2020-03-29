<?php

namespace App\Models;

use App\Models\City;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'tr_hotels';

    protected $primaryKey = 'id_hotel';
    
    protected $fillable = [
        'city_id', 'name',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
