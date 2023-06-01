<?php

namespace App\Traits;

trait Favoritable
{

    public function favorites()
    {
        return $this->belongsToMany('App\Models\Seat', 'favorites', 'user_id', 'seat_id')->withTimestamps();
    }

    public function favorite($seatId)
    {
        $this->favorites()->attach($seatId);
    }

    public function unfavorite($seatId)
    {
        $this->favorites()->detach($seatId);
    }

}
