<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Transaction;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        $transactions = Transaction::with(['user', 'event'])->get();
        return view('transaksi.billing', compact('paymentMethods', 'transactions'));
    }

    public function create()
    {
        return view('transaksi.add-method');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'bank_logo' => 'nullable|image',
        ]);

        if ($request->hasFile('bank_logo')) {
            $fileName = time() . '_' . $request->file('bank_logo')->getClientOriginalName();
            $filePath = $request->file('bank_logo')->storeAs('uploads', $fileName, 'public');
            $validated['bank_logo'] = '/storage/' . $filePath;
        }

        PaymentMethod::create($validated);

        return redirect()->route('billings')->with('success', 'Metode Pembayaran berhasil dibuat.');
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('transaksi.edit-method', compact('paymentMethod'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'bank_logo' => 'nullable|image',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);

        if ($request->hasFile('bank_logo')) {
            $fileName = time() . '_' . $request->file('bank_logo')->getClientOriginalName();
            $filePath = $request->file('bank_logo')->storeAs('uploads', $fileName, 'public');
            $validated['bank_logo'] = '/storage/' . $filePath;
        }

        $paymentMethod->update($validated);

        return redirect()->route('billings')->with('success', 'Metode Pembayaran berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('billings')->with('success', 'Metode Pembayaran berhasil dihapus.');
    }
}
