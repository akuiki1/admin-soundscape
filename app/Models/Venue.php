<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venue'; // Pastikan nama tabel sesuai dengan yang ada di database
    protected $primaryKey = 'id_venue'; // Tambahkan ini untuk menggunakan id_venue sebagai primary key

    // Tambahkan atribut lain yang diperlukan
    protected $fillable = [
        'name',
        'photo',
        'address',
        'layout',
        'capacity',
    ];
}
