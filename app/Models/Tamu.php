<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'asal_instansi', 'tanggal_bertamu', 'jam_bertamu', 'email', 'no_wa', 'target_tamu', 'keperluan', 'status', 'catatan'
    ];
}
