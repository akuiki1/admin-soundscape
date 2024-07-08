<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'event', 'ticket'])->get();
        return view('transaksi.billing', compact('transactions'));
    }

    public function confirm($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'confirmed';
        $transaction->save();

        return redirect()->route('billing')->with('success', 'Transaction confirmed successfully.');
    }

    public function reject($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'rejected';
        $transaction->save();

        return redirect()->route('billing')->with('success', 'Transaction rejected successfully.');
    }
}