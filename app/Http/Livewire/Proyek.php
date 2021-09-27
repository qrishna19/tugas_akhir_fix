<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proyek as ProyekModel;
use App\Models\Kategori as KategoriModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use App\Models\PilihAnggota as AnggotaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Proyek extends Component
{
    use WithFileUploads;

    public $statusUpdate = false;
    public $judul_proyek, $image, $deskripsi_proyek, $jenis_proyek, $id_kategori, $link_proyek, $tahun;
    public $selectedClass = null;

    public function render()
    {
        $kategori = KategoriModel::get();
        $mahasiswa = MahasiswaModel::where('id_users', Auth::user()->id)->first();
        if (isset($mahasiswa->id_mahasiswa)) {
            $proyek = AnggotaModel::with(['proyek', 'proyek.kategori', 'dosen', 'dosen.user', 'mahasiswa', 'mahasiswa.user'])
                ->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();
        } else if(Auth::user()->id_role == 3) {
            $dosen = DosenModel::where('id_users', Auth::user()->id)->first();
            $proyek = AnggotaModel::with(['proyek', 'proyek.kategori', 'dosen', 'dosen.user', 'mahasiswa', 'mahasiswa.user'])
                ->where('id_dosen', $dosen->id_dosen)->groupBy('id_proyek')->get();
        } else {
            $proyek = AnggotaModel::with(['proyek', 'proyek.kategori', 'dosen', 'dosen.user', 'mahasiswa', 'mahasiswa.user'])
            // ->join('mahasiswa', 'mahasiswa.id_mahasiswa','=','anggota.id_mahasiswa')
            ->groupBy('id_proyek')->get();
        }
        // $proyek2 = AnggotaModel::with('mahasiswa')//join('mahasiswa','anggota.id_mahasiswa','mahasiswa.id_mahasiswa')
        // // ->join('mahasiswa', 'mahasiswa.id_mahasiswa','=','anggota.id_mahasiswa')
        // ->groupBy('id_proyek')->get();
        // dd($proyek2);
        return view('livewire.proyek', [
            'proyek' => $proyek,
            'kategori' => $kategori,
        ]);
    }

    public function sukses(){

    }

    public function getProyek($id)
    {
        $this->statusUpdate = true;
        $proyek = ProyekModel::find($id);
        $this->emit('getProyek', $proyek);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = AnggotaModel::find($id);
            $data->delete();
            return redirect('/proyek');
        }
    }

    public function filter($id)
    {
    }
}
