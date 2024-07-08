<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'id_venue', 'id_ticket', 'status', 'date', 'description'];

    protected $casts = [
        'date' => 'datetime',
    ];
    
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'id_venue');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_ticket');
    }
}
