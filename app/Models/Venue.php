<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = 'venue';
    protected $primaryKey = 'id_venue';
    protected $fillable = ['name', 'photo', 'address', 'layout', 'capacity'];
}
