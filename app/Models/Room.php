<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 */
class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['active_reservation'];

    public function status()
    {
        return $this->belongsTo(RoomStatus::class, 'room_status_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }

    public function panType()
    {
        return $this->belongsTo(PanType::class);
    }

    public function badType()
    {
        return $this->belongsTo(BadType::class, 'bad_type_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function activeReservation()
    {
        return Reservation::with([
                'status'
            ])->where('room_id', $this->id)->where('status_id', 4)->first() ?? null;
    }

    public function getActiveReservationAttribute()
    {
        return $this->activeReservation();
    }
}
