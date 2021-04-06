<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $fillable = ['nama_lengkap', 'jenis_kelamin', 'profesi', 'domisili', 'no_hp', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('img-avatar/avatar.jpg');
        }
        return asset('img-avatar/' . $this->poster);
    }
}
