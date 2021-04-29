<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Workshop;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'profesi',
        'pendidikan_terakhir',
        'tanggal_lahir',
        'province_id',
        'no_hp',
        'status',
        'feedback',
        'naskah'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNaskah($name)
    {
        if (!$this->naskah) {
            return asset('naskah-workshop/' . $name);
        }
        return asset('naskah-workshop/' . $this->naskah);
    }
}
