<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\User as UserModel;

class EditProfil extends Component
{
    use WithFileUploads;
    public $nama, $prodi, $alamat, $no_hp, $email, $instagram, $foto_profil, $id_user;

    protected $listeners = [
        'editProfil' => 'showProfil'
    ];

    public function render()
    {
        return view('livewire.edit-profil');
    }

    public function showProfil($user){
        $this->nama = $user['nama'];
        $this->foto_profil = $user['foto_profil'];
        $this->alamat = $user['alamat'];
        $this->no_hp = $user['no_hp'];
        $this->instagram = $user['instagram'];
        $this->id_user = $user['id'];
    }

    public function previewImage(){
        $this->validate([
            'foto_profil' => 'image|max:2048'
        ]);
    }

    public function update(){
        $this->validate([
            'nama' => 'required',
            'foto_profil' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'instagram' => 'required',
        ]);

        $imageName = md5($this->foto_profil.microtime()).'.'.$this->foto_profil->extension();

        Storage::putFileAs(
            'public/images',
            $this->foto_profil,
            $imageName
        );

        if ($this->id){
            $user = UserModel::find($this->id_user);
            $user->update([
                'nama' =>  $this->nama,
                'foto_profil' => $imageName,
                'alamat' => $this->alamat,
                'no_hp' => $this->no_hp,
                'instagram' => $this->instagram,
            ]);
        }
        return redirect('/profil');
    }
}
