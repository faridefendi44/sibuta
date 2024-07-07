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
    public function setNoWaAttribute($value)
    {
        $this->attributes['no_wa'] = $this->formatPhoneNumber($value);
    }

    private function formatPhoneNumber($number)
    {
        if (substr($number, 0, 1) === '0') {
            return '62' . substr($number, 1);
        }

        if (substr($number, 0, 2) === '62') {
            return $number;
        }

        return $number;
    }
}
