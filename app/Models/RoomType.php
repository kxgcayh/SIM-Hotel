<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoomType extends Model
{
    use Sluggable;

    protected $table = 'ms_types';

    protected $primaryKey = 'id_type';

    protected $fillable = [
        'name', 'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // Many to Many Relationship
    public function facilities()
    {
        return $this->belongsToMany(
            RoomFacility::class, 'tr_type_has_facility', 'type_id', 'facility_id'
        );
    }
}
