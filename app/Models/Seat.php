<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    use \App\Traits\Favoritable;

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
