<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return view('venue.venue', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venue.add-venue');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required',
            'layout' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'capacity' => 'required|integer',
        ]);

        // Simpan foto dan layout ke dalam direktori tertentu (public/assets/img)
        $photoName = time().'_photo.'.$request->photo->extension();
        $layoutName = time().'_layout.'.$request->layout->extension();
        
        $request->photo->storeAs('public/assets/img', $photoName);
        $request->layout->storeAs('public/assets/img', $layoutName);

        // Buat venue baru dengan data yang disubmit
        Venue::create([
            'name' => $request->name,
            'photo' => 'assets/img/' . $photoName, // Update path yang disimpan
            'address' => $request->address,
            'layout' => 'assets/img/' . $layoutName, // Update path yang disimpan
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('venues.index')
            ->with('success', 'Venue created successfully.');
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venue.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_venue)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'layout' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $venue = Venue::findOrFail($id_venue);

        // Periksa apakah ada foto yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($venue->photo && Storage::exists('public/' . $venue->photo)) {
                Storage::delete('public/' . $venue->photo);
            }

            // Simpan foto baru ke dalam direktori penyimpanan
            $photoName = time().'_photo.'.$request->photo->extension();
            $request->photo->storeAs('public/assets/img', $photoName);
            $venue->photo = 'assets/img/' . $photoName;
        }

        // Periksa apakah ada layout yang diunggah
        if ($request->hasFile('layout')) {
            // Hapus layout lama jika ada
            if ($venue->layout && Storage::exists('public/' . $venue->layout)) {
                Storage::delete('public/' . $venue->layout);
            }

            // Simpan layout baru ke dalam direktori penyimpanan
            $layoutName = time().'_layout.'.$request->layout->extension();
            $request->layout->storeAs('public/assets/img', $layoutName);
            $venue->layout = 'assets/img/' . $layoutName;
        }

        // Update data lainnya
        $venue->name = $request->name;
        $venue->address = $request->address;
        $venue->capacity = $request->capacity;

        // Simpan perubahan
        $venue->save();

        return redirect()->route('venues.index')
            ->with('success', 'Venue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_venue)
    {
        $venue = Venue::findOrFail($id_venue);

        // Hapus foto terkait jika ada
        if ($venue->photo && Storage::exists('public/' . $venue->photo)) {
            Storage::delete('public/' . $venue->photo);
        }

        // Hapus layout terkait jika ada
        if ($venue->layout && Storage::exists('public/' . $venue->layout)) {
            Storage::delete('public/' . $venue->layout);
        }

        // Hapus venue dari database
        $venue->delete();

        return redirect()->route('venues.index')
            ->with('success', 'Venue deleted successfully.');
    }
}
