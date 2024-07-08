<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'venue_id', 'status', 'date', 'description'];

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'id_venue');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_ticket');
    }
}
