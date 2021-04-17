<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaWorkshop extends Model
{
    protected $table = 'peserta_workshop';
    use HasFactory;

    public function workshop()
    {
        return $this->belongsTo(Peserta::class);
    }
}
