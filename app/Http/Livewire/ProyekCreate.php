<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proyek as ProyekModel;
use App\Models\Kategori as KategoriModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use App\Models\PilihAnggota as AnggotaModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProyekCreate extends Component
{
    use WithFileUploads;

    public $judul_proyek,$image,$deskripsi_proyek,$jenis_proyek,$id_kategori,$link_proyek,$tahun;
    public $id_dosen;
    public $id_mahasiswa;

    public function render()
    {
        $kategori = KategoriModel::get();
        $mahasiswa = DB::table('mahasiswa')
        ->join('users', 'mahasiswa.id_users', '=', 'users.id')
        ->get();
        $dosen = DB::table('dosen')
        ->join('users', 'dosen.id_users', '=', 'users.id')
        ->get();
        $proyek = ProyekModel::get();
        return view('livewire.proyek-create',[
            'kategori' => $kategori,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'proyek' => $proyek,
        ]);
    }

    public function previewImage(){
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

    public function store(){
        $this->validate([
            'judul_proyek' => 'required',
            'image' => 'required',
            'tahun' => 'required',
            'deskripsi_proyek' => 'required',
            'jenis_proyek' => 'required',
            'id_kategori' => 'required',
            'id_dosen' => 'required',
            'id_mahasiswa' => 'required',
        ]);

        $imageName = md5($this->image.microtime()).'.'.$this->image->extension();

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );
        
        
        $proyek = ProyekModel::create([
            'image' => $imageName,
            'judul_proyek' => $this->judul_proyek,
            'tahun' => $this->tahun,
            'deskripsi_proyek' => $this->deskripsi_proyek,
            'jenis_proyek' => $this->jenis_proyek,
            'id_kategori' => $this->id_kategori,
            'link_proyek' => $this->link_proyek
        ]);

        $anggota = AnggotaModel::create([
            'id_proyek' => $proyek->id,
            'id_dosen' => $this->id_dosen,
            'id_mahasiswa' => $this->id_mahasiswa
        ]);
        return redirect('/proyek');
    }
}
