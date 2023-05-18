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

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function dataDiri()
    {
        return $this->hasOne(DataDiri::class, 'id_user_daftar');
    }

    public function dataAyah()
    {
        return $this->hasOne(DataAyah::class, 'id_user_daftar');
    }

    public function dataIbu()
    {
        return $this->hasOne(DataIbu::class, 'id_user_daftar');
    }

    public function dataWali()
    {
        return $this->hasOne(DataWali::class, 'id_user_daftar');
    }
}
