<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPertanyaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'url',
        'size',
        'pertanyaan_id',
    ];
}
