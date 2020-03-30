<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Province extends Model
{
    use Sluggable;
    
    protected $table = 'ms_provinces';

    protected $primaryKey = 'id_province';
    
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

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
