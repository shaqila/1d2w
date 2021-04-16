<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $table = 'workshop';
    protected $fillable = ['kode', 'nama', 'deskripsi', 'harga', 'tanggal_pelaksanaan', 'jumlah_peserta', 'poster'];


    public function getPoster()
    {
        if (!$this->poster) {
            return asset('img-workshop/workshop.jpg');
        }
        return asset('img-workshop/' . $this->poster);
    }

    public function peserta()
    {
        {
        return $this->belongsToMany(Peserta::class);
        }
    }
}
