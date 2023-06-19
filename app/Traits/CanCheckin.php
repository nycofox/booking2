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
        return $this->checked_in_at !== null;
    }

    public function checkin()
    {
        $this->checkins()->create([
            'checkin_at' => now(),
        ]);

        $this->update([
            'checked_in_at' => now(),
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

        $this->update([
            'checked_in_at' => null,
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
        return $query->whereNotNull('checked_in_at');
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
