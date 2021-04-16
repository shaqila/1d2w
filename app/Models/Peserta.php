<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $fillable = [
        'user_id',
        'nama_lengkap', 
        'jenis_kelamin', 
        'profesi', 
        'domisili', 
        'no_hp'
    ];

    public function workshop()
    {
        return $this->belongsToMany(Workshop::class);
            
    }
}
