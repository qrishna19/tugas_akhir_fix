@extends('layouts.app')
@section('content')
    <div>
        <div class="text-center">
            <h1 class="pt-5">Daftar Sebagai Apa</h1>
        </div>
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body" style="background-color: #8BCDCD;">
                            <div class="text-center pt-3 pb-3">
                                <div class="container" style="background-color: white">
                                    <img class="p-4" src="{{ asset('asset/presentation.png') }}" height="300" alt="logo"
                                        loading="lazy">
                                </div>
                                <h1 class="pt-2 pb-2">Dosen</h1>
                                <a class="btn btn-primary" href="/registerdosen">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body" style="background-color: #8BCDCD;">
                            <div class="text-center pt-3 pb-3">
                                <div class="container" style="background-color: white">
                                <img class="p-4" src="{{ asset('asset/students.png') }}" height="300" alt="logo"
                                    loading="lazy">
                                </div>
                                <h1 class="pt-2 pb-2">Mahasiswa</h1>
                                <a class="btn btn-primary" href="/registermahasiswa">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
