<?php

namespace App\Traits;

use App\Models\Booking;

trait CanBook
{

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function upcomingBookings()
    {
        return $this->bookings()->where('booked_from', '>', now()->startOfDay())
            ->orderBy('booked_from')->with('seat')->get();
    }

}
