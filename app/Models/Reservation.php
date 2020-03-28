<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'tr_reservations';

    protected $primaryKey = 'id_reservation';
    
    protected $fillable = [
        'room_id', 'booked_by', 'name',
    ];
}
