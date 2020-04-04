<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoomType extends Model
{
    use Sluggable;

    protected $table = 'tr_room_types';

    protected $primaryKey = 'id_room_type';

    protected $fillable = [
        'facility_id', 'name', 'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function facility()
    {
        return $this->belongsTo(RoomFacility::class, 'facility_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
