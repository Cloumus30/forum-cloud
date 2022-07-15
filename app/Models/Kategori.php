<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'deskripsi',
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function pertanyaan(){
        return $this->hasMany(Pertanyaan::class,'kategori_id','id');
    }
}
