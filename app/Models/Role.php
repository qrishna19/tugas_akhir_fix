<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User as UserModel;

class Role extends Model
{
    protected $table = 'role';
    protected $guard = [];
    use HasFactory;
    

//     public function user(){
//         return $this->hasOne(UserModel::class,'id_role','id');
//     }
}
