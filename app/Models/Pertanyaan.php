<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertanyaan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'judul',
        'body',
        'overview',
        'waktu_tanya',
        'kategori_id',
        'user_id',
    ];

    public function gambar(){
        return $this->hasMany(GambarPertanyaan::class,'pertanyaan_id','id');
    }
}
