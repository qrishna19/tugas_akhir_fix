<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\Masterdata;
use App\Models\Kategori;
use App\Models\Proyek;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MasterdataController extends Controller
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
        $counter = 0;
        $this_month_projects = Proyek::selectRaw("MONTH(created_at) as month, YEAR(created_at) as year")->get();
        foreach($this_month_projects as $this_month_project){        
            if($this_month_project->month == date("m") && $this_month_project->year == date("Y")) $counter++;
        }
        $dosen = User::where("id_role","3")->count();
        $mahasiswa = User::where("id_role","2")->count();
        $proyek = Proyek::count();
        return view('livewire.admin.masterdata', [
            'dosen' => $dosen,
            'mahasiswa' => $mahasiswa,
            'proyek' => $proyek,
            'this_month_projects' => $counter,
        ]);
    }
}
