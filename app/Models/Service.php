<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',

    ];



    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_service', 'service_id', 'room_id');
    }
}
