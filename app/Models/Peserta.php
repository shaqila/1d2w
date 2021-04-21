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
        'province_id',
        'status',
        'no_hp'
    ];

    public function workshop()
    {
        return $this->hasMany(Workshop::class);
    }
}
