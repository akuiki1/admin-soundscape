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
            'id_payment_methods' => 'required|exists:payment_methods,id',
            'quantity' => 'required|integer|min:1',
            'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $event = Event::findOrFail($event_id);
        $ticketPrice = $event->ticket->price;
        $totalPrice = $request->quantity * $ticketPrice;
    
        if ($request->hasFile('bukti_transaksi')) {
            $file = $request->file('bukti_transaksi');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $imageName);
            $paymentProofPath = 'assets/img/' . $imageName;
        }

        $transaction = new Transaction();
        $transaction->id_user = auth()->id();
        $transaction->id_event = $event_id;
        $transaction->id_payment_methods = $request->id_payment_methods;
        $transaction->quantity = $request->quantity;
        $transaction->total_price = $totalPrice;
        $transaction->payment_date = now();
        $transaction->bukti_transaksi = $paymentProofPath;
        $transaction->status = 'pending';
        $transaction->save();
    
        return redirect()->route('complete-buy-ticket', ['transaction_id' => $transaction->id]);
    }

    public function complete($transaction_id) {
        $transaction = Transaction::findOrFail($transaction_id);
        $event = Event::findOrFail($transaction->id_event);

        return view('tampilanuser.event.complete', compact('transaction', 'event'));
    }
}
