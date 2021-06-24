<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function show(Booking $booking)
    {
        return $booking;
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->validated());

        return response()->json($booking, 201);
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());

        return response()->json($booking, 200);
    }

    public function delete(Booking $booking)
    {
        $booking->delete();

        return response()->json(null, 204);
    }
}
