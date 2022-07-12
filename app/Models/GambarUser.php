<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarUser extends Model
{
    use HasFactory;
    protected $table= 'gambar_user';
    protected $fillable = [
        'nama',
        'url',
        'size',
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class,'user_id','id');
    }
}
