<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class BookingRange implements Rule
{
    protected $end;
    protected $settings;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($end)
    {
        $this->end = $end;
        $this->settings = DB::table('settings')->first();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $start = Carbon::parse($value);
        $end = Carbon::parse($this->end);
        $diff = $start->diffInDays($end);
        return $diff >= $this->settings->min_booking_days;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Rezerwacja musi być co najmniej na ' . $this->settings->min_booking_days . ' dni.';
    }
}
