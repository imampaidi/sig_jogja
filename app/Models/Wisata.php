<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $fillable = ['nama', 'foto', 'deskripsi', 'alamat', 'harga_tiket', 'latitude', 'longitude'];
}
