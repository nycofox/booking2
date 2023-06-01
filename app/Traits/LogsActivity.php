<?php

namespace App\Traits;

use App\Models\Activity;

trait LogsActivity
{

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

}
