@extends("layouts.app")
@section("content")
<div style="background-color: #F2F3F5;">
    <div class="text-center">
        <h3 class="pt-5">{{ $proyek->judul_proyek }}</h3>
    </div>
    <div class="container pt-5 pb-5">
        <div class="card p-5">
            <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-12 mb-2 mt-2 text-center">
                            <img id="preview-image-before-upload" src="{{ url('storage/images/', $proyek->image) }}" alt="preview image" style="max-height: 250px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Proyek</label>
                        <input name="judul_proyek" type="text" class="form-control" value="{{ $proyek->judul_proyek }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Proyek</label>
                        <textarea name="deskripsi_proyek" class="form-control">{{ $proyek->deskripsi_proyek }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Jenis Proyek</label>
                        <input name="jenis_proyek" type="text" class="form-control" value="{{ $proyek->jenis_proyek }}">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input name="kategori" type="text" class="form-control" value="{{ $kategori }}">
                    </div>
                    <div class="form-group">
                        <label>Pembimbing</label>
                        <input name="kategori" type="text" class="form-control" value="{{ $dosen }}">
                    </div>
                    <div class="form-group">
                        <label>Anggota</label>
                        <br>
                        <div class="form-control" style="border: none;">
                        <select name="id_anggota[]" id="member" disabled multiple>
                        @foreach($anggotas as $anggota)
                        <option value="{{$anggota->id_mahasiswa}}" selected>{{$anggota->nama}}</option>
                        @endforeach
                    </select>
                </div>
                    </div>
                    <div class="form-group">
                        <label>Link Proyek</label>
                        <input name="link_proyek" type="text" class="form-control" value="{{ $proyek->link_proyek }}">
                    </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#member').select2({
                width: '100%',
                placeholder: "Select an Option",
                allowClear: true
            });
        });

        $(document).ready(function(e) {

            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
    @endsection