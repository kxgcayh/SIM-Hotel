<?php

namespace App\Models;

use App\Models\City;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Hotel extends Model
{
    use Sluggable;

    protected $table = 'tr_hotels';

    protected $primaryKey = 'id_hotel';

    protected $fillable = [
        'city_id', 'name', 'slug','address'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
