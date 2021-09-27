<div style="background-color: #F2F3F5;">
    <div class="text-center">
        <h3>Edit Profil</h3>
    </div>
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" name="" wire:model="id">
                    <div class="form-group">
                        <label>Foto Profil</label>
                        <div class="custom-file">
                            <input wire:model="foto_profil" type="file" class="form-control" id="customFile">
                            <label for="customFile" class="custom-file-label">Choose Image</label>
                            @error('foto_profil') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{$foto_profil}}
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input wire:model="nama" type="text" class="form-control">
                        @error('nama') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>No HP</label>
                        <input wire:model="no_hp" type="text" class="form-control">
                        @error('no_hp') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea wire:model="alamat" class="form-control"></textarea>
                        @error('alamat') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Instagram</label>
                        <input wire:model="instagram" type="text" class="form-control">
                        @error('instagram') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    <div class="form-group">
                        <a href="/profil" class="btn btn-danger btn-block">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>