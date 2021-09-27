<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyek as ProyekModel;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guard = [];
    use HasFactory;

    public function proyek()
    {
        return $this->belongsTo(ProyekModel::class,'id_kategori','id_kategori');
    }
}
