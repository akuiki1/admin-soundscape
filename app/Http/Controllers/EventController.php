<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
            'id_venue' => 'required',
            'id_ticket' => 'required',
            'status' => 'required',
            'date' => 'required|date',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('uploads', $fileName, 'public');
            $validated['photo'] = '/storage/' . $filePath;
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
            'name' => 'required',
            'photo' => 'nullable|image',
            'id_venue' => 'required',
            'id_ticket' => 'required',
            'status' => 'required',
            'date' => 'required|date',
            'description' => 'nullable'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('uploads', $fileName, 'public');
            $validated['photo'] = '/storage/' . $filePath;
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
