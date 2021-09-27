<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User as UserModel;
use App\Models\Dosen as DosenModel;
use Illuminate\Support\Facades\Storage;

class RegisterDosen extends Component
{
    use WithFileUploads;
    public $email, $password, $id_role;
    public $nama, $nidn, $prodi, $foto_profil, $alamat, $no_hp, $instagram;

    public function render()
    {
        return view('livewire.register-dosen');
    }

    public function previewImage(){
        $this->validate([
            'foto_profil' => 'image|max:2048'
        ]);
    }

    public function store(){
        $this->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'foto_profil' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'instagram' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $imageName = md5($this->foto_profil.microtime()).'.'.$this->foto_profil->extension();

        Storage::putFileAs(
            'public/images',
            $this->foto_profil,
            $imageName
        );

        $user = UserModel::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'id_role' => 3,
            'foto_profil' => $imageName,
            'prodi' => $this->prodi,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'instagram' => $this->instagram,
        ]);

        $dosen = DosenModel::create([
            'id_users' => $user->id,
            'nidn' => $this->nidn,
        ]);

        return redirect('/login');
    }
}
