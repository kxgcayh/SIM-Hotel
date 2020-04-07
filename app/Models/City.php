<?php

namespace App\Models;

use App\Models\Province;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class City extends Model
{
    use Sluggable;

    protected $table = 'tr_cities';

    protected $primaryKey = 'id_city';
    
    protected $fillable = [
        'province_id', 'name', 'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
