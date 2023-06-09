<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

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

    public function approve()
    {
        $this->update([
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);
    }

    public function reject()
    {
        $this->delete();
    }

}
