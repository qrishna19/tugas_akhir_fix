<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PilihAnggota as AnggotaModel;
use App\Models\Kategori as KategoriModel;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $guard = [];
    protected $fillable = ['image','judul_proyek','tahun','deskripsi_proyek','jenis_proyek','id_kategori','link_proyek'];
    use HasFactory;

    public function anggota()
    {
       return $this->hasMany(AnggotaModel::class,'id_proyek');
    }

    public function kategori()
    {
        return $this->hasOne(KategoriModel::class,'id_kategori','id_kategori');
    }
    
}
