<div style="background-color: #f2f3f5">
    <div class="text-center">
        <h3 class="pt-5">Input Proyek</h3>
    </div>
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <label>Gambar Proyek</label>
                        <div class="custom-file">
                            <input
                                wire:model="image"
                                type="file"
                                class="form-control"
                                id="customFile"
                            />
                            <label for="customFile" class="custom-file-label"
                                >Pilih Gambar</label
                            >
                            @error('image')
                            <small class="text-danger">{{ $message }}</small
                            >@enderror
                        </div>
                        @if ($image)
                        <label class="mt-3">Image Preview</label>
                        <img
                            src="{{ $image->temporaryUrl() }}"
                            height="30"
                            class="img-fluid"
                            alt="Preview Image"
                        />
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Judul Proyek</label>
                        <input
                            wire:model="judul_proyek"
                            placeholder="Masukan judul proyek"
                            type="text"
                            class="form-control"
                        />
                        @error('judul_proyek')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <input
                            wire:model="tahun"
                            placeholder="Masukan tahun proyek dibuat"
                            type="text"
                            class="form-control"
                        />
                        @error('tahun')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Proyek</label>
                        <textarea
                            wire:model="deskripsi_proyek"
                            placeholder="Masukan deskripsi singkat tentang proyek yang anda buat"
                            class="form-control"
                        ></textarea>
                        @error('deskripsi_proyek')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Proyek</label>
                        <input
                            wire:model="jenis_proyek"
                            placeholder="Contoh : Proyek Matakuliah/Skripsi/Tugas Akhir/Proyek Lomba"
                            type="text"
                            class="form-control"
                        />
                        @error('jenis_proyek')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select wire:model="id_kategori" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($kategori as $value)
                            <option value="{{ $value->id_kategori }}">
                                {{ $value->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Link Proyek</label>
                        <input
                            wire:model="link_proyek"
                            placeholder="Masukan link proyek google drive/github"
                            type="text"
                            class="form-control"
                        />
                        @error('link_proyek')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Dosen</label>
                        <select wire:model="id_dosen" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($dosen as $value)
                            <option value="{{ $value->id_dosen}}">
                                {{ $value->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('$id_dosen')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select wire:model="id_mahasiswa" id="member" class="form-control">
                            <option value="">Pilih salah satu</option>
                            @foreach ($mahasiswa as $value)
                            <option value="{{ $value->id_mahasiswa }}">
                                {{ $value->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('$id_mahasiswa')
                        <small class="text-danger">{{ $message }}</small
                        >@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#member").select2({
            width: "100%",
            placeholder: "Select an Option",
            allowClear: true,
        });
    });
</script>
