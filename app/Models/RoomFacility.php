<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoomFacility extends Model
{
    use Sluggable;

    protected $table = 'ms_room_facilities';

    protected $primaryKey = 'id_facility';

    protected $fillable = [
        'name', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function roomtypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
