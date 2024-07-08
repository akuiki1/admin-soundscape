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
        'id_ticket', 
        'quantity', 
        'total_price', 
        'payment_date', 
        'payment_proof', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id');
    }
}
