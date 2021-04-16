<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    protected $table = 'karya';
    protected $fillable = ['id', 'nama_karya', 'level', 'deskripsi', 'cover', 'pdf'];
    
    public function getPdf($name)
    {
        if (!$this->pdf) {
            return asset('pdf-workshop/'.$name);
        }
        return asset('pdf-workshop/' . $this->pdf);
    }
    public function getCover()
    {
        if (!$this->cover) {
            return asset('cover-karya/cover.jpg');
        }
        return asset('cover-karya/' . $this->cover);
    }
}
