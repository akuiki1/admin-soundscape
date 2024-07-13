<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 
        'id_event', 
        'id_payment_methods', 
        'quantity', 
        'total_price', 
        'payment_date', 
        'bukti_transaksi', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function payment_methods()
    {
        return $this->belongsTo(PaymentMethod::class, 'id_payment_methods');
    }
}
