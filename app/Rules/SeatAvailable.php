<?php

namespace App\Rules;

use App\Models\Seat;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SeatAvailable implements ValidationRule
{

    public $booked_from;
    public $booked_to;

    public function __construct($booked_from, $booked_to)
    {
        $this->booked_from = $booked_from;
        $this->booked_to = $booked_to;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $seat = Seat::find($value);

//        dd($value, $this->booked_from, $this->booked_to);

        if(!$seat->isAvailable($this->booked_from, $this->booked_to)) {
            $fail('Plassen er ikke tilgjengelig på det valgte tidspunktet.');
        }
    }

}
