<div style="background-color: #F2F3F5;">
    <div class="text-center">
        <h3 class="pt-5">Edit Proyek</h3>
    </div>
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" name="" wire:model="id">
                    <div class="form-group">
                        <label>Gambar Proyek</label>
                        <div class="custom-file">
                            <input wire:model="image" type="file" class="form-control" id="customFile">
                            <label for="customFile" class="custom-file-label">Choose Image</label>
                            @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        {{$image}}
                    </div>

                    <div class="form-group">
                        <label>Judul Proyek</label>
                        <input wire:model="judul_proyek" type="text" class="form-control">
                        @error('judul_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <input wire:model="tahun" type="text" class="form-control">
                        @error('tahun') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Proyek</label>
                        <textarea wire:model="deskripsi_proyek" class="form-control"></textarea>
                        @error('deskripsi_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Proyek</label>
                        <input wire:model="jenis_proyek" type="text" class="form-control">
                        @error('jenis_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select wire:model="id_kategori" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($kategori as $value)
                                <option value="{{ $value->id_kategori }}">{{ $value->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Link Proyek</label>
                        <input wire:model="link_proyek" type="text" class="form-control">
                        @error('link_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    <div class="form-group">
                        <a href="/proyek" class="btn btn-danger btn-block">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>