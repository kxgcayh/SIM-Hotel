<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  protected $table = 'ms_level';

  protected $primaryKey = 'id';

  protected $fillable = [
      'name','guard_name',

  ];

  public $timestamps = false;
}
