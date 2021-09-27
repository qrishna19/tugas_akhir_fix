<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User as UserModel;
use App\Models\Dosen as DosenModel;
use App\Models\Mahasiswa as MahasiswaModel;
use Illuminate\Support\Facades\Auth;

class Profil extends Component
{
    use WithFileUploads;
    
    public $statusProfil = false;

    public $image;

    public function render()
    {
        $dosen = DosenModel::where('id_users',Auth::user()->id)->first();
        $mahasiswa = MahasiswaModel::where('id_users',Auth::user()->id)->first();
        if(isset($dosen->id_dosen)){
            $user = UserModel::with('dosen')->where('id',$dosen->id_users)->get();
        } else if(Auth::user()->id_role == 2) {
            $user = UserModel::with('mahasiswa')->where('id',$mahasiswa->id_users)->get();
        } else {
            $user = UserModel::where('id',Auth::user()->id)->get();
        }
        //echo ($user->toJson());die;
        return view('livewire.profil', [
            'user' => $user,
        ]);
    }

    public function editProfil($id)
    {
        $this->statusProfil = true;
        $user = UserModel::find($id);
        $this->emit('editProfil', $user);
    }

}
