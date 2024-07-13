<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'events', 'payment_methods'])->get();
        return view('transaksi.billing', compact('transactions'));
    }

    public function confirm($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'confirmed';
        $transaction->save();

        return redirect()->route('billings')->with('success', 'Transaction confirmed successfully.');
    }

    public function reject($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'rejected';
        $transaction->save();

        return redirect()->route('billings')->with('success', 'Transaction rejected successfully.');
    }

    public function printTicket($id)
    {
        $transaction = Transaction::with(['user', 'event'])->findOrFail($id);

        if ($transaction->status !== 'confirmed') {
            return redirect()->route('billings')->with('error', 'Hanya transaksi yang sudah dikonfirmasi yang dapat mencetak tiket.');
        }

        // Logika untuk mencetak tiket
        // Misalnya, Anda bisa mengirim data ke view baru yang didedikasikan untuk tampilan tiket
        return view('transaksi.tiket', compact('transaction'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('billings')->with('success', 'transaksi berhasil dihapus.');
    }
}