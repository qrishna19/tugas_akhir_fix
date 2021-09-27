<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body" style="background-color: #8BCDCD;">
                    <form wire:submit.prevent="store">
                        <div class="text-center pt-3">
                            <h1>{{ __('Register') }}</h1>
                            <h4>Mahasiswa</h4>
                        </div>
                        </br>
                        <div class="form-group pl-5 pr-5">
                            <label>Foto Profil</label>
                            <div class="custom-file">
                                <input wire:model="foto_profil" type="file" class="form-control" id="customFile">
                                <label for="customFile" class="custom-file-label">Pilih Foto Profil</label>
                                @error('foto_profil') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            @if ($foto_profil)
                                <label class="mt-3">Image Preview</label>
                                <img src="{{ $foto_profil->temporaryUrl() }}" height="30" class="img-fluid"
                                    alt="Preview Image">
                            @endif
                        </div>
                        <div class="form-group pl-5 pr-5">
                            <label>Nama</label>
                            <input wire:model="nama" placeholder="Masukan nama anda" type="text" class="form-control">
                            @error('nama') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group pl-5 pr-5">
                            <label>NIM</label>
                            <input wire:model="nim" placeholder="Pastikan NIM anda benar contoh 19/12345/SV/1235" type="text" class="form-control">
                            @error('nim') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group pl-5 pr-5">
                            <label>Prodi</label>
                            <input wire:model="prodi" placeholder="Masukan prodi anda" type="text" class="form-control">
                            @error('prodi') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group pl-5 pr-5">
                            <label>alamat</label>
                            <textarea wire:model="alamat" placeholder="Masukan alamat lengkap anda" class="form-control"></textarea>
                            @error('alamat') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <label>No HP</label>
                            <input wire:model="no_hp" placeholder="Masukan nomor handphone anda" type="text" class="form-control">
                            @error('no_hp') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <label>instagram</label>
                            <input wire:model="instagram" placeholder="Masukan username instagram anda" type="text" class="form-control">
                            @error('instagram') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <label>Email</label>
                            <input wire:model="email" placeholder="Masukan email anda" type="text" class="form-control">
                            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <label>Password</label>
                            <input wire:model="password" placeholder="Masukan password anda" type="password" class="form-control">
                            @error('judul_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
