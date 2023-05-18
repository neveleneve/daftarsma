<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'id_daftar',
        'tahun_ajaran',
        'verifikasi'
    ];

    public function userDaftar()
    {
        return $this->belongsTo(UserDaftar::class, 'id', 'id_user_daftar');
    }
}
