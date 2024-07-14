<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('venue.venue', compact('venues'));
    }

    public function create()
    {
        return view('venue.add-venue');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'layout' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'capacity' => 'required|integer',
        ]);

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('assets/img'), $photoName);
            $validated['photo'] = 'assets/img/' . $photoName;
        }

        if ($request->hasFile('layout')) {
            $layoutName = time() . '.' . $request->file('layout')->getClientOriginalExtension();
            $request->file('layout')->move(public_path('assets/img'), $layoutName);
            $validated['layout'] = 'assets/img/' . $layoutName;
        }

        Venue::create($validated);

        return redirect()->route('venues.index')->with('success', 'Venue berhasil dibuat.');
    }

    public function show($id_venue)
    {
        $venue = Venue::findOrFail($id_venue);
        return view('venue.show', compact('venue'));
    }

    public function showLayout($id_venue)
    {
        $venue = Venue::findOrFail($id_venue);
        return view('venue.showLayout', compact('venue'));
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venue.edit', compact('venue'));
    }

    public function update(Request $request, $id_venue)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'layout' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $venue = Venue::findOrFail($id_venue);

        if ($request->hasFile('photo')) {
            if ($venue->photo && file_exists(public_path($venue->photo))) {
                unlink(public_path($venue->photo));
            }
            $photoName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('assets/img'), $photoName);
            $validated['photo'] = 'assets/img/' . $photoName;
        }

        if ($request->hasFile('layout')) {
            if ($venue->layout && file_exists(public_path($venue->layout))) {
                unlink(public_path($venue->layout));
            }
            $layoutName = time() . '.' . $request->file('layout')->getClientOriginalExtension();
            $request->file('layout')->move(public_path('assets/img'), $layoutName);
            $validated['layout'] = 'assets/img/' . $layoutName;
        }

        $venue->update($validated);

        return redirect()->route('venues.index')->with('success', 'Venue berhasil diperbarui.');
    }

    public function destroy($id_venue)
    {
        $venue = Venue::findOrFail($id_venue);

        if ($venue->photo && file_exists(public_path($venue->photo))) {
            unlink(public_path($venue->photo));
        }

        if ($venue->layout && file_exists(public_path($venue->layout))) {
            unlink(public_path($venue->layout));
        }

        $venue->delete();

        return redirect()->route('venues.index')->with('success', 'Venue berhasil dihapus.');
    }
}
