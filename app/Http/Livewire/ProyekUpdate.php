<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proyek as ProyekModel;
use App\Models\Kategori as KategoriModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProyekUpdate extends Component
{
    use WithFileUploads;

    public $judul_proyek,$image,$deskripsi_proyek,$jenis_proyek,$id_kategori,$link_proyek,$tahun,$id_proyek, $id_dosen;

    protected $listeners = [
        'getProyek' => 'showProyek'
    ];

    public function render()
    {
        $kategori = KategoriModel::get();
        $mahasiswa = MahasiswaModel::get();
        $dosen = DosenModel::get();
        $proyek = ProyekModel::get();
        return view('livewire.proyek-update',[
            'kategori' => $kategori,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'proyek' => $proyek,
        ]);
    }

    public function showProyek($proyek){
        $this->judul_proyek = $proyek['judul_proyek'];
        $this->image = $proyek['image'];
        $this->deskripsi_proyek = $proyek['deskripsi_proyek'];
        $this->jenis_proyek = $proyek['jenis_proyek'];
        $this->id_kategori = $proyek['id_kategori'];
        $this->link_proyek = $proyek['link_proyek'];
        $this->tahun = $proyek['tahun'];
        $this->id_proyek = $proyek['id'];
    }

    public function previewImage(){
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

    public function update(){
        $this->validate([
            'judul_proyek' => 'required',
            'image' => 'required',
            'tahun' => 'required',
            'deskripsi_proyek' => 'required',
            'id_kategori' => 'required',
            'link_proyek' => 'required',
        ]);

        $imageName = md5($this->image.microtime()).'.'.$this->image->extension();

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );

        if ($this->id){
            $proyek = ProyekModel::find($this->id_proyek);
            $proyek->update([
                'image' => $imageName,
                'judul_proyek' => $this->judul_proyek,
                'tahun' => $this->tahun,
                'deskripsi_proyek' => $this->deskripsi_proyek,
                'jenis_proyek' => $this->jenis_proyek,
                'id_kategori' => $this->id_kategori,
                'link_proyek' => $this->link_proyek
            ]);
        }
        return redirect('/proyek');
    }
}
