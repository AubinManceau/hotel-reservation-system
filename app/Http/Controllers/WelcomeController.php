<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Reservations;

class WelcomeController extends Controller
{
    public function index()
    {
        $hotels = Hotels::all();
        return view('welcome', compact('hotels'));
    }

    public function show($id)
    {
        $hotel = Hotels::find($id);
        return view('welcome.show', compact('hotel'));
    }

    public function create($id)
    {
        $hotel = Hotels::find($id);
        return view('welcome.create', compact('hotel'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_lastname' => ['required', 'max:255'],
            'client_firstname' => ['required', 'max:255'],
            'client_email' => ['required', 'email'],
            'client_phone' => ['required', 'numeric', 'digits:10'],
            'hotel_id' => ['required', 'numeric'],
            'room_id' => ['required', 'numeric'],
            'date_start' => ['required', 'date', 'after_or_equal:today'],
            'date_end' => ['required', 'date', 'after:date_start'],
        ]);

        $existingReservation = Reservations::where('room_id', $request->room_id)
        ->where(function ($query) use ($request) {
            $query->whereBetween('date_start', [$request->date_start, $request->date_end]);
        })
        ->first();

        if ($existingReservation) {
            $errors = new \Illuminate\Support\MessageBag;
            $errors->add('room_id', 'Cette chambre est déjà réservée pour cette période.');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $hotel = Hotels::find($id);
        $reservations = Reservations::create($request->all());
        return redirect()->route('welcome.show', $hotel->id);
    }
}
