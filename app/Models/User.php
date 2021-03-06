<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 
        'email', 
        'password',
        'tgl_lahir',
        'umur',
        'alamat',
        'gambar_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function pertanyaan(){
        return $this->hasMany(Pertanyaan::class,'user_id','id');
    }

    public function jawaban(){
        return $this->hasMany(Jawaban::class,'user_id','id');
    }

    public function gambarUser(){
        return $this->hasOne(GambarUser::class,'user_id','id');
    }

}
