<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return Inertia::render('Restaurants/Index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Restaurants/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'food_type' => 'required|max:255',
            'location' => 'required|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'description' => 'required'
        ]);

        Restaurant::create($validated);

        return redirect()->route('restaurants.index')->with('message', 'Restaurant Created Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Inertia::render('Restaurants/Show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Restaurants/Edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'food_type' => 'required|max:255',
            'location' => 'required|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'description' => 'required',
        ]);

        $restaurant->update($validated);

        return redirect()->route('restaurants.index')->with('message', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('message', 'Restaurant deleted successfully.');
    }
}
