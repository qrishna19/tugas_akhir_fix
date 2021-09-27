<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaProyek extends Model
{
    protected $table = 'anggota_proyek';
    protected $guard = [];
    use HasFactory;
    protected $fillable = [
        'is_proyek','id_user'
    ];
}
