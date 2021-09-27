@extends("layouts.app")
@section("content")
<div style="background-color: #F2F3F5;">
    <div class="text-center">
        <h3 class="pt-5">User</h3>
    </div>
    
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            @foreach($user as $index=>$users)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <table class="table-lg">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>:</td>
                                    <td>{{$users->id}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{$users->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$users->email}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Users</td>
                                    <td>:</td>
                                    <td>{{$users->role->nama_role}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><a href="/user/{{$users->id}}">Selengkapnya</a></td>
                                </tr>
                                <!-- <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td>{{$users->nim}}</td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>:</td>
                                    <td>{{$users->prodi}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{$users->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td>{{$users->no_hp}}</td>
                                </tr>
                                <tr>
                                    <td>Social Media</td>
                                    <td>:</td>
                                    <td>{{$users->instagram}}</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection