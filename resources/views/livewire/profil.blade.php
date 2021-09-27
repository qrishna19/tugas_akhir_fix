<div class="pt-5" style="background-color: #f8fafc;">
    @foreach ($user as $index => $user)
        <div class="text-center">
            <img style="border-radius: 50%" src="{{ url('storage/images/', $user->foto_profil) }}" height="150" width="150"
                alt="foto_profil" loading="lazy">
            <h2 class="pt-5">{{ $user->nama }}</h2>
        </div>
        <ul class="nav nav-tabs justify-content-center pt-5" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tentang-tab" data-toggle="tab" href="#tentang" role="tab"
                    aria-controls="tentang" aria-selected="false" style="color:black">
                    <h3>Tentang</h3>
                </a>
            </li>
        </ul>

        <div style="background-color: #F2F3F5;">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tentang" role="tabpanel" aria-labelledby="tentang-tab">
                    <div class="container pt-5 pb-5">
                        @if (isset($statusProfil))
                            <livewire:edit-profil></livewire:edit-profil>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="col align-self-end text-right">
                                    <div class="dropdown">
                                        <a href="#" class="nav-link" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('asset/more.svg') }}" height="30"
                                                alt="logo" loading="lazy">
                                        </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton">
                                                <button wire:click="editProfil({{ $user->id }})"
                                                    class="dropdown-item" href="#"><h5>Edit</h5></button>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 p-5">
                                        <table class="table-lg">
                                            <tbody>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>Nama Lengkap</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        @if(isset($user->dosen))
                                                            <h5>NIDN</h5>
                                                            @endif
                                                        @if(isset($user->mahasiswa))
                                                            <h5>NIM</h5>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>Prodi</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>Alamat</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>No HP</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>Email</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>Social Media</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-1">
                                        <img src="{{ asset('asset/line 2.png') }}" height="500" alt="logo"
                                            loading="lazy">
                                    </div>

                                    <div class="col-md-6 p-5">
                                        <table class="table-lg">
                                            <tbody>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>{{ $user->nama }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        @if(isset($user->dosen))
                                                            <h5>{{ $user->dosen->nidn }}</h5>
                                                            @endif
                                                        @if(isset($user->mahasiswa))
                                                            <h5>{{ $user->mahasiswa->nim }}</h5>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>{{ $user->prodi }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>{{ $user->alamat }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>{{ $user->no_hp }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <h5>{{ $user->email }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-4">
                                                        <a href="https://www.instagram.com/{{$user->instagram}}"><h5>{{ $user->instagram }}</h5></a>
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
            </div>
    @endforeach
</div>
