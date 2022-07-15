<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jawaban extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'body',
        'pertanyaan_id',
        'user_id',
        'quill_delta',
        'vote'
    ];

    public function gambar(){
        return $this->hasMany(GambarJawaban::class,'jawaban_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
