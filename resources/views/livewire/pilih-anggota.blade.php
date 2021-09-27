<div style="background-color: #F2F3F5;">
    <div class="text-center">
        <h3 class="pt-5">Input Anggota</h3>
    </div>
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label>Nama Proyek</label>
                        <select wire:model="id_proyek" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($proyek as $value)
                                <option value="{{ $value->id_proyek }}">{{ $value->judul_proyek }}</option>
                            @endforeach
                        </select>
                        @error('$id_proyek') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Dosen Pembimbing</label>
                        <select wire:model="id_dosen" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($dosen as $value)
                                <option value="{{ $value->id_dosen}}">{{ $value->nama }}</option>
                            @endforeach
                        </select>
                        @error('$id_dosen') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select wire:model="id_mahasiswa" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($mahasiswa as $value)
                                <option value="{{ $value->id_mahasiswa }}">{{ $value->nama }}</option>
                            @endforeach
                        </select>
                        @error('$id_mahasiswa') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
