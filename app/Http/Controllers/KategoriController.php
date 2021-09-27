<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proyek as ProyekModel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
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
        $kategori = Kategori::get();
        return view('livewire.kategori', [
            'kategori' => $kategori,
        ]);
    }


    public function showProjects($id)
    {
        if($id<4)
        $proyek = ProyekModel::where("id_kategori", $id)->orderBy('created_at', 'DESC')->get();
        else 
        $proyek = ProyekModel::where("jenis_proyek","LIKE", "%tugas akhir%")->orderBy('created_at', 'DESC')->get();
        return view('livewire.tampil_kategori', [
            'proyek' => $proyek,
            'order' => "1",
            'q' => "",
        ]);
    }

    public function order($id, Request $request)
    {
        $order = $request->order;
        
        if($id<4) $proyekByCategory = ProyekModel::where("id_kategori", $id);
        else $proyekByCategory = ProyekModel::where("jenis_proyek","LIKE", "%tugas akhir%");

        $proyek = $proyekByCategory->where("judul_proyek","LIKE", "%".$request->q."%")->orderBy('created_at', 'DESC')->get();
        if($order == 2)
            $proyek = $proyekByCategory->where("judul_proyek","LIKE", "%".$request->q."%")->orderBy('judul_proyek', 'ASC')->get();
        return view('livewire.tampil_kategori', [
            'proyek' => $proyek,
            'order' => $order,
            'q' => $request->q,
        ]);
    }

    
}