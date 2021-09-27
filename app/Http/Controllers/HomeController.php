<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Role;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use App\Models\Proyek;
use App\Models\AnggotaProyek;
use App\Models\PilihAnggota;

class HomeController extends Controller
{
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
        $proyek = Proyek::orderBy('created_at', 'DESC')->get();
        return view('home', [
            'proyek' => $proyek,
            'order' => "1",
            'q' => "",
        ]);
    }

    public function order(Request $request)
    {
        $order = $request->order;
        $proyek = Proyek::where("judul_proyek","LIKE", "%".$request->q."%")->orderBy('created_at', 'DESC')->get();
        if($order == 2)
            $proyek = Proyek::where("judul_proyek","LIKE", "%".$request->q."%")->orderBy('judul_proyek', 'ASC')->get();
        return view('home', [
            'proyek' => $proyek,
            'order' => $order,
            'q' => $request->q,
        ]);
    }

    public function tampil_proyek($id)
    {
        //SELECT * FROM `anggota_proyek` JOIN users ON anggota_proyek.id_user = users.id WHERE id_proyek=9
        $proyek = Proyek::find($id);
        $anggota = PilihAnggota::where("id_proyek",$id)->first();
        $dosen = Dosen::where("id_dosen",$anggota->id_dosen)->first();
        $user = User::find($dosen->id_users);
        $kategori = Kategori::where("id_kategori",$proyek->id_kategori)->first();
        // $anggotas = PilihAnggota::join('users', 'anggota_proyek.id_user','=','users.id')->where('id_proyek', $proyek->id)->get();
        
        $mahasiswa = DB::table('anggota')
        ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'anggota.id_mahasiswa')
        ->join('users', 'mahasiswa.id_users', '=', 'users.id')
        ->where('id_proyek', '=', $id)
        ->get();
        return view('livewire.tampil_proyek', [
            'proyek' => $proyek,
            'kategori' => $kategori->nama_kategori,
            'dosen' => $user->nama,
            'anggotas' => $mahasiswa
        ]);
    }
}
