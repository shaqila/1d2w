<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'peserta_id',
        'workshop_id',
        'nama',
        'no_handphone',
        'workshop',
        'harga',
        'penumpang_id',
        'petugas_id'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    // public function peserta()
    // {
    //     return $this->belongsTo(Peserta::class);
    // }
    // public function workshop()
    // {
    //     return $this->belongsTo(Workshop::class);
    // }
}
