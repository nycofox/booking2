<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    use \App\Traits\Favoritable;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'requires_approval' => 'boolean',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function scopeAvailable($query)
    {
        return $query->whereDoesntHave('bookings', function ($query) {
            $query->where('bookings.starts_at', '<=', now())
                ->where('bookings.ends_at', '>=', now());
        });
    }

    public function book($user, $startsAt, $endsAt)
    {
        $this->bookings()->create([
            'user_id' => $user->id,
            'booked_from' => $startsAt,
            'booked_to' => $endsAt,
        ]);
    }
}
