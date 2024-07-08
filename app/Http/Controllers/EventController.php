<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;
use App\Models\Ticket;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('venue', 'ticket')->get();
        return view('event.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venues = Venue::all();
        $tickets = Ticket::all();
        return view('add-event', compact('venues', 'tickets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'venue' => 'required|exists:venues,id',
            'tiket' => 'required|exists:tickets,id',
            'status' => 'required|string',
            'tanggal_expired_tiket' => 'required|date',
            'about_me' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $validated['photo'] = $imageName;
        }

        Event::create([
            'name' => $validated['name'],
            'photo' => $validated['photo'],
            'id_venue' => $validated['venue'],
            'id_ticket' => $validated['tiket'],
            'status' => $validated['status'],
            'date' => $validated['tanggal_expired_tiket'],
            'description' => $validated['about_me'],
        ]);

        return redirect()->route('event')->with('success', 'Event baru berhasil ditambahkan');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
