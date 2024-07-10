<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengirim', 'email','no_surat', 'no_wa', 'perihal', 'lampiran', 'asal_surat', 'status', 'catatan'
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
