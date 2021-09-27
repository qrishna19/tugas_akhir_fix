@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center pt-5">
    <div class="col-md-10">
        <div class="">
            <form action="{{route('order')}}" method="GET">
            <input class="form-control form-control-lg" name="q" style="height:50px" type="text" placeholder="Pencarian" value="{{ $q }}"/>
            <br>
            <select class="form-control form-control-sm" name="order" style="width:150px">
                <option value="1" selected="{{ $order === '1' ? 'selected' : '' }}">Proyek Terbaru</option>
                <option value="2" selected="{{ $order === '2' ? 'selected' : '' }}">Judul Proyek</option>
            </select>
            <button type="submit" name="submit" class="btn btn-primary mt-1">urutkan</button>
        </div>
    </div>
</form>
</div>
<div class="row justify-content-md-center pt-5 m-2">
    @foreach($proyek as $proyek)
    <div class="col-md-4 text-center">
        <img src="{{ url('storage/images/', $proyek->image) }}" class="gambar_home">
        <h4 class="item-title pt-3"> <a href="/tampil_proyek/{{$proyek->id}}">{{$proyek->judul_proyek}}</a></h4>
        <p class="item-desc">{{$proyek->deskripsi_proyek}}</p>
    </div>
    @endforeach
</div>
@endsection