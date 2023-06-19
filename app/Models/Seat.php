<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Seat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'requires_approval' => 'boolean',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

//    public function book($user, $startsAt, $endsAt, $request = null)
//    {
//        $this->bookings()->create([
//            'user_id' => $user->id,
//            'booked_from' => $startsAt,
//            'booked_to' => $endsAt,
//            'request' => $request,
//        ]);
//    }

    public function isAvailable($from, $to)
    {
        return $this->bookings()->whereBetween('booked_from', [$from, $to])
            ->orWhereBetween('booked_to', [$from, $to])
            ->doesntExist();
    }

    public function isReserved($from, $to)
    {
        return !$this->isAvailable($from, $to);
    }

    public function scopeReserved(Builder $query, $from, $to)
    {
        return $query->whereHas('bookings', function ($query) use ($from, $to) {
            $query->whereBetween('booked_from', [$from, $to])
                ->orWhereBetween('booked_to', [$from, $to]);
        });

//        return $query->whereDoesntHave('bookings', function ($query, $from, $to) {
//            $query->where('booked_from', '<=', $to)
//                ->where('booked_to', '>=', $from);
//        });
    }

    public function scopeBookingsDate(Builder $query, $date)
    {
        return $query->with(['bookings' => function ($query) use ($date) {
            $query->whereDate('bookings.booked_from', $date);
        }]);
    }

    public function getIsFavoriteAttribute()
    {
        return auth()->user()->favorites->contains($this->id);
    }
}
