<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'id_daftar',
        'tahun_ajaran',
        'verifikasi'
    ];
}
