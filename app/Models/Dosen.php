<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PilihAnggota as AnggotaModel;
use App\Models\User as UserModel;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $guard = [];
    protected $fillable = ['id_users','nidn'];
    use HasFactory;

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_dosen','id_dosen');
    }

    public function user()
    {
        return $this->hasOne(UserModel::class,'id', 'id_users');
    }
}
