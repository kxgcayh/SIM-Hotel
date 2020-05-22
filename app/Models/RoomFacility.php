<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoomFacility extends Model
{
    use Sluggable;

    protected $table = 'ms_facilities';

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

    // Many to Many Relationship
    public function types()
    {
        return $this->belongsToMany(
            RoomType::class, 'tr_type_has_facility', 'facility_id', 'type_id'
        );
    }
}
