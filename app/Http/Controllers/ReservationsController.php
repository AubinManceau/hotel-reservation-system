<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Hotels;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index($id)
    {
        $hotel = Hotels::find($id);
        $reservations = Reservations::where('hotel_id', $id)->get();
        return view('reservations.index', compact('reservations', 'hotel'));
    }

    public function create($id)
    {
        $hotel = Hotels::find($id);
        return view('reservations.create', compact('hotel'));
    }

    public function store(Request $request, $id)
    {
        $hotel = Hotels::find($id);
        $reservations = Reservations::create($request->all());
        return redirect()->route('reservations.index', $hotel->id);
    }

    public function edit($id, $id_reservation)
    {
        $hotel = Hotels::find($id);
        // dd($id_reservation, $id);
        $reservations = Reservations::find($id_reservation);
        return view('reservations.edit', compact('reservations', 'hotel'));
    }

    public function update(Request $request, $id, $id_reservation)
    {
        $hotel = Hotels::find($id);
        $reservations = Reservations::find($id_reservation);
        $reservations->client_lastname = $request->get('client_lastname');
        $reservations->client_firstname = $request->get('client_firstname');
        $reservations->client_email = $request->get('client_email');
        $reservations->client_phone = $request->get('client_phone');
        $reservations->room_id = $request->get('room_id');
        $reservations->date_start = $request->get('date_start');
        $reservations->date_end = $request->get('date_end');
        $reservations->save();

        return redirect()->route('reservations.index', $id);
    }

    public function destroy(Request $request, $id)
    {
        $hotel = Hotels::find($id);
        $reservations = Reservations::find($request->get('id_reservation'));
        $reservations->delete();

        return redirect()->route('reservations.index', $id);
    }
}
