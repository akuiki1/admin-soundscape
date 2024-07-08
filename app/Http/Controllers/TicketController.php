<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.tiket', compact('tickets'));
    }

    public function create()
    {
        return view('ticket.add-tiket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'expiry_date' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Ticket::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('ticket.edit-tiket', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'expiry_date' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $ticket = Ticket::find($id);
        $ticket->update($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
