<?php

namespace App\Models;

use App\Traits\CanBook;
use App\Traits\CanCheckin;
use App\Traits\HasCandidates;
use App\Traits\HasRoles;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use LogsActivity, HasRoles, CanCheckin, CanBook, HasCandidates;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'social_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active_at' => 'datetime',
        'anonymized_at' => 'datetime'
    ];

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function getProfilePictureAttribute()
    {
        return $this->avatar_url ?? url('img/unknown_user.jpg');
    }

    public function anonymize()
    {
        $this->update([
            'name' => 'Anonymisert bruker',
            'email' => null,
            'avatar_url' => null,
            'remember_token' => null,
            'anonymized_at' => now(),
        ]);
    }

}
