<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'karya';
    protected $fillable = ['id', 'nama_karya', 'level', 'deskripsi', 'cover', 'pdf'];

    public function getPdf($name)
    {
        if (!$this->pdf) {
            return asset('pdf-workshop/' . $name);
        }
        return asset('pdf-workshop/' . $this->pdf);
    }
    public function getCover()
    {
        if (!$this->cover) {
            return asset('cover-karya/cover01.jpg');
        }
        return asset('cover-karya/' . $this->cover);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_karya'
            ]
        ];
    }
}
