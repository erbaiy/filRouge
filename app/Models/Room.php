<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'room_type',
        'description',
        'image',
        'price',
        'user_id',
        'category_id',
    ];

    protected $dates = ['deleted_at'];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id');
    }
    public function bookings()
    {
        return $this->hasMany(Reservation::class);
    }
    public function isAvailableForBooking($checkInDate, $checkOutDate)
    {
        $booked = $this->bookings()
            ->where('checkout', '>', $checkInDate)
            ->where('checkin', '<', $checkOutDate)
            ->exists();

        return !$booked;
    }
}