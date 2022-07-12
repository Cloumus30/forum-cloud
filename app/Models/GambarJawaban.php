<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarJawaban extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'url',
        'size',
        'jawaban_id',
    ];
}
