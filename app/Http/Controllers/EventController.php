<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('venue', 'ticket')->get();
        return view('event.event', compact('events'));
    }

    public function create()
    {
        $venues = Venue::all();
        $tickets = Ticket::all();
        return view('event.add-event', compact('venues', 'tickets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_venue' => 'required|integer',
            'id_ticket' => 'required|integer',
            'status' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:5000'
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('assets/img'), $fileName);
            $validated['photo'] = 'assets/img/' . $fileName;
        }

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $venues = Venue::all();
        $tickets = Ticket::all();
        return view('event.edit-event', compact('event', 'venues', 'tickets'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_venue' => 'required|integer',
            'id_ticket' => 'required|integer',
            'status' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:5000'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($event->photo && file_exists(public_path($event->photo))) {
                unlink(public_path($event->photo));
            }
            $fileName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('assets/img'), $fileName);
            $validated['photo'] = 'assets/img/' . $fileName;
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->photo && file_exists(public_path($event->photo))) {
            unlink(public_path($event->photo));
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
