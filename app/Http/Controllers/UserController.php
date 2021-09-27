<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use App\Models\Dosen as DosenModel;
use App\Models\Mahasiswa as MahasiswaModel;

class UserController extends Controller
{
    
    
    public $statusProfil = false;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = UserModel::with('role')
        // ->select('*')
        // ->select('*,role.id as role_id')
        // ->select('users.*')
        ->get();
        return view('livewire.user', [
            'user' => $user,
        ]);
    }

    public function show($id){
        $dosen = DosenModel::where('id_users',$id)->first();
        $mahasiswa = MahasiswaModel::where('id_users',$id)->first();
        if(isset($dosen->id_dosen)){
            $user = UserModel::with('dosen')->where('id',$dosen->id_users)->get();
        } else if(isset($mahasiswa->id_mahasiswa)) {
            $user = UserModel::with('mahasiswa')->where('id',$mahasiswa->id_users)->get();
        } else {
            $user = UserModel::where('id',$id)->get();
        }
        
        return view('livewire.detail_user', [
            'user' => $user,
        ]);
    }
    
}