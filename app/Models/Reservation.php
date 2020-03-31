<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'tr_reservations';

    protected $primaryKey = 'id_reservation';
    
    protected $fillable = [
        'room_id', 'booked_by', 'name',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
}
