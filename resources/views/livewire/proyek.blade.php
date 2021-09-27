<div>
    @if ($statusUpdate)
        <livewire:proyek-update></livewire:proyek-update>
    @endif

    <div class="container text-center">
        <h3 class="pt-5">List Proyek</h3>
        {{-- <select class="form-control form-control-sm" style="width:150px" wire:model="selectedClass">
            <option value="">Filter Kategori</option>
            @foreach($kategori as $index)
            <option value="{{$index->id_kategori}}">{{$index->nama_kategori}}</option>
            @endforeach
        </select> --}}
        <div class="form-group pt-4 text-right">
            <a href="/pilihanggota" class="btn btn-primary">Tambah Anggota</a>
        </div>
    </div>
    @foreach ($proyek as $index => $proyek)
        <div class="container pb-4">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col align-self-end text-right">
                            <div class="dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('asset/more.svg') }}" height="30"
                                                alt="logo" loading="lazy">
                                        </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item" style="color: red" data-toggle="modal"
                                        data-target="#exampleModal"><h5>Delete</h5>
                                        
                                    </button>
                                    <button wire:click="getProyek({{ $proyek->id_proyek }})" class="dropdown-item"
                                        href="#"><h5>Edit</h5></button>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-5 pl-5 pr-5">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <img src="{{ url('storage/images/', $proyek->proyek->image) }}" height="300" width="200"
                                    alt="gambar proyek" loading="lazy">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="align-middle">
                                <table class="table-lg" style="height: 300px">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Judul Proyek</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->proyek->judul_proyek }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Deskripsi</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->proyek->deskripsi_proyek }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Jenis Proyek</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->proyek->jenis_proyek }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Kategori</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->proyek->kategori->nama_kategori }} </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Pembimbing</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->dosen->user->nama }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Anggota Proyek</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <h5>{{ $proyek->mahasiswa->user->nama }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Link Proyek</h5>
                                            </td>
                                            <td class="pr-5 pl-5">
                                                <h5>:</h5>
                                            </td>
                                            <td>
                                                <a href="https://{{ $proyek->proyek->link_proyek }}"><h5>{{ $proyek->proyek->link_proyek }}</h5></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Proyek</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin untuk menghapus proyek?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger"
                            wire:click="destroy({{ $proyek->id }})">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
