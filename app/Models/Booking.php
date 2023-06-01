<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function seat()
    {
        return $this->belongsTo('App\Models\Seat');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
