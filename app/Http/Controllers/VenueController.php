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
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $photoPath = $request->file('photo')->storeAs('uploads', $photoName, 'public');
            $validated['photo'] = '/storage/' . $photoPath;
        }

        if ($request->hasFile('layout')) {
            $layoutName = time() . '_' . $request->file('layout')->getClientOriginalName();
            $layoutPath = $request->file('layout')->storeAs('uploads', $layoutName, 'public');
            $validated['layout'] = '/storage/' . $layoutPath;
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
            if ($venue->photo && Storage::exists('public/' . $venue->photo)) {
                Storage::delete('public/' . $venue->photo);
            }
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $photoPath = $request->file('photo')->storeAs('uploads', $photoName, 'public');
            $validated['photo'] = '/storage/' . $photoPath;
        }

        if ($request->hasFile('layout')) {
            if ($venue->layout && Storage::exists('public/' . $venue->layout)) {
                Storage::delete('public/' . $venue->layout);
            }
            $layoutName = time() . '_' . $request->file('layout')->getClientOriginalName();
            $layoutPath = $request->file('layout')->storeAs('uploads', $layoutName, 'public');
            $validated['layout'] = '/storage/' . $layoutPath;
        }

        $venue->update($validated);

        return redirect()->route('venues.index')->with('success', 'Venue berhasil diperbarui.');
    }

    public function destroy($id_venue)
    {
        $venue = Venue::findOrFail($id_venue);

        if ($venue->photo && Storage::exists('public/' . $venue->photo)) {
            Storage::delete('public/' . $venue->photo);
        }

        if ($venue->layout && Storage::exists('public/' . $venue->layout)) {
            Storage::delete('public/' . $venue->layout);
        }

        $venue->delete();

        return redirect()->route('venues.index')->with('success', 'Venue berhasil dihapus.');
    }
}
