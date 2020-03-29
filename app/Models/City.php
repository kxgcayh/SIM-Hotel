<?php

namespace App\Models;

use App\Models\Province;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tr_cities';

    protected $primaryKey = 'id_city';
    
    protected $fillable = [
        'province_id', 'name',
    ];

    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
