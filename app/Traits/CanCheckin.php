<?php

namespace App\Traits;

use App\Models\Checkin;

trait CanCheckin
{

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function isCheckedIn()
    {
        return $this->checkins()->whereNull('checkout_at')->exists();
    }

    public function checkin()
    {
        $this->checkins()->create([
            'checkin_at' => now(),
        ]);
    }

    public function checkout($force = false)
    {
        $checkin = $this->checkins()->whereNull('checkout_at')->first();

        $checkin->update([
            'checkout_at' => now(),
            'forced_checkout' => $force,
            'duration' => now()->diffInMinutes($checkin->checkin_at),
        ]);
    }

    public function forceCheckout()
    {
        $this->checkout(true);
    }

    public function toggleCheckin()
    {
        if ($this->isCheckedIn()) {
            $this->checkout();
        } else {
            $this->checkin();
        }
    }

}
