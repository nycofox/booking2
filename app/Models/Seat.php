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

    public function book($user, $startsAt, $endsAt, $request = null)
    {
        $this->bookings()->create([
            'user_id' => $user->id,
            'booked_from' => $startsAt,
            'booked_to' => $endsAt,
            'request' => $request,
        ]);
    }

    public function scopeAvailable(Builder $query, $from, $to)
    {
        return $query->whereDoesntHave('bookings', function ($query, $from, $to) {
            $query->where('booked_from', '<=', $to)
                ->where('booked_to', '>=', $from);
        });
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
