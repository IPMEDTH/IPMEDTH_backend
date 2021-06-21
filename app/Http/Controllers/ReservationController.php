<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Reservation::with(['location' => function($query) {
                $query->select(['id', 'name', 'image_url']);
            }])->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dummyUser = "1";
        try {
            $reservation = Reservation::create([
                'user_id' => $dummyUser,
                'location_id' => $request->location,
                'date' => $request->date,
                'start_time' => $request->start,
                'end_time' => $request->end,
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }
        return response()->json(
            $reservation
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return response()->json(
            Reservation::with(['location' => function($query) {
                $query->select(['id', 'name', 'image_url']);
            }])->findOrFail($reservation->id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
