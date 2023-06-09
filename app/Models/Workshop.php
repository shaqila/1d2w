<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Workshop extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'workshop';
    protected $fillable = ['kode', 'slug', 'nama', 'deskripsi', 'harga', 'tanggal_pelaksanaan', 'jam_pelaksanaan', 'poster'];


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

    // public function user()
    // {
    //     return $this->belongsToMany(User::class, 'peserta');
    // }

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
