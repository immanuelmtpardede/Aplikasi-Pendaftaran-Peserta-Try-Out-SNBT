@extends("dashboard.parts.main")

@section("fillBody")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
        <h1 class="h1">Pendaftaran TRY OUT SNBT</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/post/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method("put")
            @csrf

            <div class="mb-3">
                <label for="FotoDiri" class="form-label">Foto Diri</label>
                <input type="file" class="form-control @error("FotoDiri") is-invalid @enderror" id="FotoDiri" name="FotoDiri" onclick="return confirm('Apakah Anda yakin ingin mengubah foto diri pendaftar ini? Kalau tidak, klik cancel.')">
                @error("FotoDiri")
                <div class="invalid-feedback">
                    Upload the file and make sure it must be an image.
                </div>
                @enderror
            </div>
            <label for="FotoDiri">
                <div class="position-absolute" style="background-color: rgba(255, 255, 255, 0.5)">Foto Diri Sebelumnya</div>
                <img src="{{ asset("/storage/" . $post->FotoDiri) }}" width=250px class="mb-3">
            </label>
            <div class="mb-3">
                <label for="FotoKTP" class="form-label">Foto KTP</label>
                <input type="file" class="form-control @error("FotoKTP") is-invalid @enderror" id="FotoKTP" name="FotoKTP" onclick="return confirm('Apakah Anda yakin ingin mengubah foto KTP pendaftar ini? Kalau tidak, klik cancel.')">
                @error("FotoKTP")
                <div class="invalid-feedback">
                    Upload the file and make sure it must be an image.
                </div>
                @enderror
            </div>
            <label for="FotoKTP">
                <div class="position-absolute" style="background-color: rgba(255, 255, 255, 0.5)">Foto KTP Sebelumnya</div>
                <img src="{{ asset("/storage/" . $post->FotoKTP) }}" width=250px class="mb-3">
            </label>
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error("Nama") is-invalid @enderror" id="Nama" name="Nama" value="{{ old("Nama", $post->Nama) }}">
                @error("Nama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="TempatLahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control @error("TempatLahir") is-invalid @enderror" id="TempatLahir" name="TempatLahir" value="{{ old("TempatLahir", $post->TempatLahir) }}">
                @error("TempatLahir")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error("TanggalLahir") is-invalid @enderror" id="TanggalLahir" name="TanggalLahir" value="{{ old("TanggalLahir", date_format(date_create($post->TanggalLahir), "Y-m-d")) }}">
                @error("TanggalLahir")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select @error("JenisKelamin") is-invalid @enderror" id="JenisKelamin" name="JenisKelamin">
                    <option value="Laki-laki" @if(old("JenisKelamin", $post->JenisKelamin) === "Laki-laki") selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if(old("JenisKelamin", $post->JenisKelamin) === "Perempuan") selected @endif>Perempuan</option>
                </select>
                @error("JenisKelamin")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="GolDarah" class="form-label">Golongan Darah</label>
                <select class="form-select @error("GolDarah") is-invalid @enderror" id="GolDarah" name="GolDarah">
                    <option value="A" @if(old("GolDarah", $post->GolDarah) === "A") selected @endif>A</option>
                    <option value="AB" @if(old("GolDarah", $post->GolDarah) === "AB") selected @endif>AB</option>
                    <option value="B" @if(old("GolDarah", $post->GolDarah) === "B") selected @endif>B</option>
                    <option value="O" @if(old("GolDarah", $post->GolDarah) === "O") selected @endif>O</option>
                </select>
                @error("GolDarah")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error("Alamat") is-invalid @enderror" id="Alamat" name="Alamat" value="{{ old("Alamat", $post->Alamat) }}">
                @error("Alamat")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control @error("Provinsi") is-invalid @enderror" id="Provinsi" name="Provinsi" value="{{ old("Provinsi", $post->Provinsi) }}">
                @error("Provinsi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Kota" class="form-label">Kota</label>
                <input type="text" class="form-control @error("Kota") is-invalid @enderror" id="Kota" name="Kota" value="{{ old("Kota", $post->Kota) }}">
                @error("Kota")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control @error("Kecamatan") is-invalid @enderror" id="Kecamatan" name="Kecamatan" value="{{ old("Kecamatan", $post->Kecamatan) }}">
                @error("Kecamatan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Sekolah" class="form-label">Sekolah</label>
                <input type="text" class="form-control @error("Sekolah") is-invalid @enderror" id="Sekolah" name="Sekolah" value="{{ old("Sekolah", $post->Sekolah) }}">
                @error("Sekolah")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="BerkasPendaftaran" class="form-label">Berkas Pendaftaran</label>
                <input type="file" class="form-control @error("BerkasPendaftaran") is-invalid @enderror" id="BerkasPendaftaran" name="BerkasPendaftaran" onclick="return confirm('Apakah Anda yakin ingin mengubah berkas pendaftaran pendaftar ini? Kalau tidak, klik cancel.')">
                @error("BerkasPendaftaran")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="LokasiUjian" class="form-label">Lokasi Ujian</label>
                <select class="form-select @error("LokasiUjian") is-invalid @enderror" id="LokasiUjian" name="LokasiUjian">
                    <option value="Kota Medan" @if(old("LokasiUjian", $post->LokasiUjian) === "Kota Medan") selected @endif>Kota Medan</option>
                    <option value="Kota Jakarta" @if(old("LokasiUjian", $post->LokasiUjian) === "Kota Jakarta") selected @endif>Kota Jakarta</option>
                    <option value="Kota Surabaya" @if(old("LokasiUjian", $post->LokasiUjian) === "Kota Surabaya") selected @endif>Kota Surabaya</option>
                    <option value="Kota Pontianak" @if(old("LokasiUjian", $post->LokasiUjian) === "Kota Pontianak") selected @endif>Kota Pontianak</option>
                    <option value="Kota Jayapura" @if(old("LokasiUjian", $post->LokasiUjian) === "Kota Jayapura") selected @endif>Kota Jayapura</option>
                </select>
                @error("LokasiUjian")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-3">Edit</button>
        </form>
    </div>
@endsection