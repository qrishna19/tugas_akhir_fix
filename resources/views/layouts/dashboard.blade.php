@extends('layout.base')
@section('title')
Mahasiswa
@endsection
@section('content')
<div class="row" style="background-color:#F2F3F5;margin-left:-20px;margin-top:-20px">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3" style="padding-top: 40px;">
            <input class="form-control form-control-lg" style="height:50px" type="text" placeholder="Pencarian">
            <br>
            <select class="form-control form-control-sm" style="width:150px">
                <option>Proyek Terbaru</option>
                <option>Aplikasi WEB</option>
                <option>Aplikasi Mobile</option>
                <option>Tugas Akhir</option>
                <option>Multimedia</option>
            </select>
        </div>
    </div>
</div>
<div class="row project-item" style="background-color:#F2F3F5;margin-left:-20px;margin-top:-20px,">
    <div style="padding-top: 40px;">
        <div class="col-md-4 text-center">
            <img src="{{asset('asset/proyek.png')}}" class="item-image">
            <h3 class="item-title">Judul Proyek</h3>
            <p class="item-desc">Deskripsi singkat</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{asset('asset/proyek.png')}}" class="item-image">
            <h3 class="item-title">Judul Proyek</h3>
            <p class="item-desc">Deskripsi singkat</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{asset('asset/proyek.png')}}" class="item-image">
            <h3 class="item-title">Judul Proyek</h3>
            <p class="item-desc">Deskripsi singkat</p>
        </div>
    </div>
</div>
<div class="row project-item" style="background-color:#F2F3F5;margin-left:-20px;margin-top:-20px">
<div style="padding-top: 40px;">
    <div class="col-md-4 text-center">
        <img src="{{asset('asset/proyek.png')}}" class="item-image">
        <h3 class="item-title">Judul Proyek</h3>
        <p class="item-desc">Deskripsi singkat</p>
    </div>
    <div class="col-md-4 text-center">
        <img src="{{asset('asset/proyek.png')}}" class="item-image">
        <h3 class="item-title">Judul Proyek</h3>
        <p class="item-desc">Deskripsi singkat</p>
    </div>
    <div class="col-md-4 text-center">
        <img src="{{asset('asset/proyek.png')}}" class="item-image">
        <h3 class="item-title">Judul Proyek</h3 >
        <p class="item-desc">Deskripsi singkat</p>
    </div>
</div>
</div>
@endsection