<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'ms_provinces';

    protected $primaryKey = 'id_province';
    
    protected $fillable = [
        'name',
    ];
}
