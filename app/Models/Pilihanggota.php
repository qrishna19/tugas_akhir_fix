<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyek as ProyekModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;

class PilihAnggota extends Model
{
    protected $table = 'anggota';
    protected $guard = [];
    protected $fillable = ['id_dosen','id_mahasiswa','id_proyek'];
    use HasFactory;

    public function proyek()
    {
        return $this->belongsTo(ProyekModel::class,'id_proyek','id');
    }

    public function dosen()
    {
        return $this->HasOne(DosenModel::class,'id_dosen','id_dosen');
    }

    public function mahasiswa()
    {
        return $this->HasOne(MahasiswaModel::class,'id_mahasiswa','id_mahasiswa');
    }
}
