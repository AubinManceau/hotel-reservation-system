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
}
