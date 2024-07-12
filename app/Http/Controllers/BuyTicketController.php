<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\PaymentMethod;

class BuyTicketController extends Controller
{
    public function showBuyTicketForm($event_id) {
        $event = Event::findOrFail($event_id);
        $paymentMethods = PaymentMethod::all();
    
        return view('tampilanuser.event.buy-ticket', compact('event', 'paymentMethods'));
    }
    
    public function storeBuyTicket(Request $request, $event_id) {
        $request->validate([
            'payment_method' => 'required|exists:metode_pembayaran,id',
            'quantity' => 'required|integer|min:1',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $event = Event::findOrFail($event_id);
        $ticketPrice = $event->ticket->price;
        $totalPrice = $request->quantity * $ticketPrice;
    
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
    
        $transaction = new Transaction();
        $transaction->id_user = auth()->id();
        $transaction->id_event = $event_id;
        $transaction->id_ticket = $event->ticket->id;
        $transaction->quantity = $request->quantity;
        $transaction->total_price = $totalPrice;
        $transaction->payment_date = now();
        $transaction->bukti_transaksi = $paymentProofPath;
        $transaction->status = 'pending';
        $transaction->save();
    
        return redirect()->away('https://wa.me/YOUR_ADMIN_WHATSAPP_NUMBER?text=Saya%20telah%20melakukan%20pembayaran%20untuk%20event%20'.$event->name.'%20dengan%20ID%20Transaksi:%20'.$transaction->id);
    }
    
}
