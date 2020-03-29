<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'tr_rooms';

    protected $primaryKey = 'id_room';
    
    protected $fillable = [
        'hotel_id', 'name',
    ];

    public $timestamps = false;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
