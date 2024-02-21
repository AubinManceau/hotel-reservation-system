<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Reservations;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function welcome()
    {
        $hotels = Hotels::all();
        return view('welcome', compact('hotels'));
    }

    public function welcomeShow($id)
    {
        $hotel = Hotels::find($id);
        return view('welcome.show', compact('hotel'));
    }

    public function welcomeCreate($id)
    {
        $hotel = Hotels::find($id);
        return view('welcome.create', compact('hotel'));
    }

    public function welcomeStore(Request $request, $id)
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

        $hotel = Hotels::find($id);
        $reservations = Reservations::create($request->all());
        return redirect()->route('welcome.show', $hotel->id);
    }

    public function index()
    {
        $hotels = Hotels::all();
        return view('dashboard', compact('hotels'));
    }

    public function show($id)
    {
        $hotel = Hotels::find($id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {

        $hotel = Hotels::find($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'nb_rooms' => ['required', 'numeric'],
            'price' => ['required', 'numeric']
        ]);

        $hotel = Hotels::find($id);
        $hotel->name = $request->get('name');
        $hotel->description = $request->get('description');
        $hotel->location = $request->get('location');
        $hotel->image = $request->get('image');
        $hotel->nb_rooms = $request->get('nb_rooms');
        $hotel->price = $request->get('price');
        $hotel->save();

        return redirect()->route('hotels.show', $id);
    }

    public function destroy(Request $request)
    {
        $hotel = Hotels::find($request->get('id'));
        $hotel->delete();

        return redirect()->route('dashboard');
    }
}
