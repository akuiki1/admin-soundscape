<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Method untuk menampilkan semua transaksi
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    // Method untuk menampilkan form pembuatan transaksi baru
    public function create()
    {
        return view('transactions.create');
    }

    // Method untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'amount' => 'required|numeric',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        // Simpan bukti pembayaran
        $path = $request->file('payment_proof')->store('public/payment_proofs');

        // Simpan data transaksi
        $transaction = new Transaction();
        $transaction->user_id = $validatedData['user_id'];
        $transaction->event_id = $validatedData['event_id'];
        $transaction->amount = $validatedData['amount'];
        $transaction->payment_proof = $path;
        $transaction->status = $validatedData['status'];
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    // Method untuk menampilkan detail transaksi
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    // Method untuk menampilkan form edit transaksi
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    // Method untuk memperbarui transaksi
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'amount' => 'required|numeric',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        $transaction = Transaction::findOrFail($id);

        // Update payment proof jika ada file baru yang diupload
        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('public/payment_proofs');
            $transaction->payment_proof = $path;
        }

        $transaction->user_id = $validatedData['user_id'];
        $transaction->event_id = $validatedData['event_id'];
        $transaction->amount = $validatedData['amount'];
        $transaction->status = $validatedData['status'];
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Method untuk menghapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
