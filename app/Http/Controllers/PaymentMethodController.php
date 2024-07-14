<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

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
            'bank_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bank_logo')) {
            $fileName = time() . '.' . $request->file('bank_logo')->getClientOriginalExtension();
            $request->file('bank_logo')->move(public_path('assets/img'), $fileName);
            $validated['bank_logo'] = 'assets/img/' . $fileName;
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
            'bank_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);

        if ($request->hasFile('bank_logo')) {
            if ($paymentMethod->bank_logo && file_exists(public_path($paymentMethod->bank_logo))) {
                unlink(public_path($paymentMethod->bank_logo));
            }
            $fileName = time() . '.' . $request->file('bank_logo')->getClientOriginalExtension();
            $request->file('bank_logo')->move(public_path('assets/img'), $fileName);
            $validated['bank_logo'] = 'assets/img/' . $fileName;
        }

        $paymentMethod->update($validated);

        return redirect()->route('billings')->with('success', 'Metode Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        if ($paymentMethod->bank_logo && file_exists(public_path($paymentMethod->bank_logo))) {
            unlink(public_path($paymentMethod->bank_logo));
        }

        $paymentMethod->delete();

        return redirect()->route('billings')->with('success', 'Metode Pembayaran berhasil dihapus.');
    }
}
