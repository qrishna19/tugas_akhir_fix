<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PilihAnggota as AnggotaModel;
use App\Models\User as UserModel;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $guard = [];
    protected $fillable = ['id_users','nim'];
    use HasFactory;

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_mahasiswa','id_mahasiswa');
    }

    public function user()
    {
        return $this->hasOne(UserModel::class,'id', 'id_users');
    }
}
