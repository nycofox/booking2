<?php

namespace App\Traits;

use App\Models\Checkin;
use Illuminate\Database\Eloquent\Builder;

trait CanCheckin
{

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function isCheckedIn(): bool
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

    public function scopeCheckedIn(Builder $query)
    {
        return $query->whereHas('checkins', function ($query) {
            $query->whereNull('checkout_at');
        });
    }

    public function minutesCheckedIn($from = null, $to = null): int
    {
        if(!$from) {
            $from = now()->startOfWeek();
        }

        if(!$to) {
            $to = now();
        }

        return (int) $this->checkins()
            ->where('checkin_at', '>=', $from)
            ->where('checkin_at', '<=', $to)
            ->sum('duration');
    }

}
