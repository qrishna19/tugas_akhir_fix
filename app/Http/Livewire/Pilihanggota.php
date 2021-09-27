<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PilihAnggota as Anggota;
use App\Models\Proyek as ProyekModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PilihAnggota extends Component
{
    public $id_proyek, $id_dosen;
    public $id_mahasiswa;
    public $anggota;


    public function render()
    {
        $mahasiswa = MahasiswaModel::where('id_users', Auth::user()->id)->first();
        if (isset($mahasiswa->id_mahasiswa)) {
            $proyek = DB::table('proyek')->join('anggota', 'proyek.id', '=', 'anggota.id_proyek')
            ->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->groupBy("proyek.id")->get();
        } else if(Auth::user()->id_role == 3) {
            $dosen = DosenModel::where('id_users', Auth::user()->id)->first();
            $proyek = DB::table('proyek')->join('anggota', 'proyek.id', '=', 'anggota.id_proyek')
            ->where('id_dosen', $dosen->id_dosen)->groupBy("proyek.id")->get();
        } else {
            $proyek = DB::table('proyek')->join('anggota', 'proyek.id', '=', 'anggota.id_proyek')
            ->groupBy("proyek.id")->get();
        }
        //SELECT users.nama FROM anggota JOIN mahasiswa ON mahasiswa.id_mahasiswa=anggota.id_mahasiswa JOIN users ON mahasiswa.id_users=users.id WHERE anggota.id_proyek != 1
        $mahasiswa1 = DB::table('mahasiswa')
        ->join('users', 'mahasiswa.id_users', '=', 'users.id')
        ->get();
        // $mahasiswa1 = DB::table('anggota')
        // ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'anggota.id_mahasiswa')
        // ->join('users', 'mahasiswa.id_users', '=', 'users.id')
        // ->where('anggota', '!=', '')
        // ->get();
        $dosen1 = DB::table('dosen')
        ->join('users', 'dosen.id_users', '=', 'users.id')
        ->get();
    
        return view('livewire.pilih-anggota', [
            'mahasiswa' => $mahasiswa1,
            'dosen' => $dosen1,
            'proyek' => $proyek,
        ]);
    }

    public function store()
    {
        Anggota::create([
            'id_proyek' => $this->id_proyek,
            'id_dosen' => $this->id_dosen,
            'id_mahasiswa' => $this->id_mahasiswa,
        ]);

        return redirect('/berhasil');
    }

}
