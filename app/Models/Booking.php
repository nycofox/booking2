<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'booked_from' => 'datetime',
        'booked_to' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public function seat()
    {
        return $this->belongsTo('App\Models\Seat');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
