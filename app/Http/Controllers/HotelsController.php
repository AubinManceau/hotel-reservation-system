<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Reservations;
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
        $validatedData = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'max:2048'],
            'nb_rooms' => ['required', 'numeric'],
            'price' => ['required', 'numeric']
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Hotels::create($input);

        return redirect()->route('hotels.show', $hotel->id);
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

        $destinationPath = 'image/';
        $imagePath = $destinationPath . $hotel->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $hotel->delete();

        return redirect()->route('dashboard');
    }
}
