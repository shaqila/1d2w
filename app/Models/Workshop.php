<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Workshop extends Model
{
    use HasFactory;

    protected $table = 'workshop';
    protected $fillable = ['kode', 'slug', 'nama', 'deskripsi', 'harga', 'tanggal_pelaksanaan', 'batas_pendaftaran', 'jam_pelaksanaan', 'jumlah_peserta', 'poster'];


    public function getPoster()
    {
        if (!$this->poster) {
            return asset('img-workshop/workshop.jpg');
        }
        return asset('img-workshop/' . $this->poster);
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['jam_pelaksanaan'])->translatedFormat('l, d F Y');
    }

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class, 'peserta_workshop');
    }

    public function peserta_workshop()
    {
        return $this->belongsToMany(Peserta::class, 'peserta', 'user_id', 'peserta_workshop');
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'nama'
    //         ]
    //     ];
    // }
}
