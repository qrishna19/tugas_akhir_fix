@extends("layouts.app")
@section("content")
<div style="background-color: #F2F3F5;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="well lead text-center kategori pt-2 pb-2">
                    <div class="card-header" style="background-color: rgb(255, 255, 255);">Dashboard</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card cardstyle " style="padding: 20px;">
                    <div class="card-header" style="color: grey;">Total Project</div>
                    <div class="card-body">
                        <h1 class="card-title">{{$proyek}}</h1>
                        <p class="card-text">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardstyle" style="padding: 20px;">
                    <div class="card-header" style="color: grey;">Mahasiswa</div>
                    <div class="card-body">
                        <h1 class="card-title">{{$mahasiswa}}</h1>
                        <p class="card-text">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardstyle" style="padding: 20px;">
                    <div class="card-header" style="color: grey;">Dosen</div>
                    <div class="card-body">
                        <h1 class="card-title">{{$dosen}}</h1>
                        <p class="card-text">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardstyle" style="padding: 20px;">
                    <div class="card-header" style="color: grey;">Total Proyek Bulan Ini</div>
                    <div class="card-body">
                        <h1 class="card-title">{{$this_month_projects}}</h1>
                        <p class="card-text">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection