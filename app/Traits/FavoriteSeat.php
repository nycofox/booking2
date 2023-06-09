<?php

namespace App\Traits;

trait FavoriteSeat
{

    public function favorites()
    {
        return $this->belongsToMany('App\Models\Seat', 'favorites', 'user_id', 'seat_id')->withTimestamps();
    }

    public function hasFavorite($seatId)
    {
        return $this->favorites()->where('seat_id', $seatId)->exists();
    }

    public function addFavorite($seatId)
    {
        $this->favorites()->attach($seatId);
    }

    public function removeFavorite($seatId)
    {
        $this->favorites()->detach($seatId);
    }

    public function removeAllFavorites()
    {
        $this->favorites()->detach();
    }

}
