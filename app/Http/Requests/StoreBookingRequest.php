<?php

namespace App\Http\Requests;

use App\Rules\BookingRange;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room_id' => 'required',
            'user_id' => 'required',
            'start_date'    => ['required', 'date', 'after:now', new BookingRange($this->end_date)],
            'end_date'      => 'required|date|after:start_date',
        ];
    }
}
