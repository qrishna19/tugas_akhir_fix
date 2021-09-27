<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proyek as ProyekModel;
use App\Models\Kategori as KategoriModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use App\Models\PilihAnggota as AnggotaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Component
{
    public $judul_proyek, $image, $deskripsi_proyek, $jenis_proyek, $id_kategori, $link_proyek, $tahun;
    public $selectedClass = null;

    public function render()
    {
        $kategori = KategoriModel::get();
        $mahasiswa = MahasiswaModel::where('id_users', Auth::user()->id)->first();
        if (isset($mahasiswa->id_mahasiswa)) {
            $proyek = DB::table('proyek')
            ->join('anggota', 'proyek.id', '=', 'anggota.id_proyek')
            ->where('id_mahasiswa', $mahasiswa->id_mahasiswa)
            ->when($this->selectedClass, function ($query){
                $query->where('id_kategori', $this->selectedClass);
            })->get();
        } else {
            $dosen = DosenModel::where('id_users', Auth::user()->id)->first();
            $proyek = AnggotaModel::with(['proyek', 'proyek.kategori', 'dosen', 'dosen.user', 'mahasiswa', 'mahasiswa.user'])
            ->where('id_dosen', $dosen->id_dosen)->groupBy('id_proyek')->get();
        }
        //echo ($kategori1->toJson());die;
        
        return view('livewire.mahasiswa', [
            'proyek' => $proyek,
            'kategori' => $kategori,
        ]);
    }

}
