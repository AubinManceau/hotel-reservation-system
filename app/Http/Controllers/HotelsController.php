<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index()
    {
        $hotels = Hotels::all();
        return view('dashboard', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $hotels = Hotels::create($request->all());
        return redirect()->route('dashboard');
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
