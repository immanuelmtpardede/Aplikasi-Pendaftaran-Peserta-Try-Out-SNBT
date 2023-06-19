@extends("dashboard.parts.main")

@section("fillBody")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
        <h1 class="h1">Lihat</h1>
        @if($post->isVerified == 1)
        <form action="/dashboard/post/{{ $post->slug }}" method="post">
            @method("put")
            @csrf
            <input type="hidden" name="download" value="1">
            <button type="submit" class="btn btn-outline-primary">
                📁 Unduh Kartu Ujian
            </button>
        </form>
        @else
        <form action="/dashboard/post/{{ $post->slug }}" method="post" id="formVerifikasi">
            @method("put")
            @csrf
            @can("admin")
            <div class="mb-3">
                <label class="form-label">Verifikasi pendaftaran</label>
                <br>
                <input type="radio" class="btn-check" name="isVerified" id="option1" @if(old("isVerified", $post->isVerified) === "-1") checked @endif value="-1" onclick="myFunction()">
                <label class="btn btn-outline-danger" for="option1">Tolak</label>
                <input type="radio" class="btn-check" name="isVerified" id="option2" @if(old("isVerified", $post->isVerified) === "1") checked @endif value="1" onclick="myFunction()">
                <label class="btn btn-outline-success" for="option2">Terima</label>
            </div>
            @endcan
        </form>
        @endif
    </div>
    
    <div class="col-lg-12">
        <p class="h5 mb-5">Status: @if($post->isVerified == 0) {{ "☒ Pendaftaran Anda belum diverifikasi." }} @elseif($post->isVerified == -1) {{ "❎ Pendaftaran Anda sudah diverifikasi. Namun sayangnya, Anda tidak lolos seleksi berkas." }} @else {{ "✅ Pendaftaran Anda sudah diverifikasi. Selamat, Anda lolos seleksi berkas. Silakan unduh kartu ujian Anda." }} @endif</p>
        <div class="row mb-3">
            <div class="col-5 d-flex justify-content-center align-content-center flex-wrap">
                <a href="{{ asset("storage/" . $post->FotoDiri) }}" class="text-decoration-none" target="_">
                    <img src="{{ asset("storage/" . $post->FotoDiri) }}" alt="Foto Diri" class="mb-3 MyHover rounded" style="width: 350px; height: 250px; object-fit: cover">
                </a>
                <a href="{{ asset("storage/" . $post->FotoKTP) }}" class="text-decoration-none" target="_">
                    <img src="{{ asset("storage/" . $post->FotoKTP) }}" alt="Foto Diri" class="mb-3 MyHover rounded" style="width: 350px; height: 250px; object-fit: cover">
                </a>
                <a href="{{ asset("storage/" . $post->BerkasPendaftaran) }}" class="text-decoration-none btn btn-outline-primary mb-3" target="_">
                    📁 Unduh berkas pendaftaran
                </a>
            </div>
            <div class="col-7" style="font-size:25px; font-family: 'Lucida Console', monospace;">
                <p class="mb-1">Nama: {{ $post->Nama}}</p>
                <p class="mb-1">Tempat Lahir: {{ $post->TempatLahir}}</p>
                <p class="mb-1">Tanggal Lahir: {{ date_format(date_create($post->TanggalLahir), "d-m-Y") }}</p>
                <p class="mb-1">Jenis Kelamin: {{ $post->JenisKelamin}}</p>
                <p class="mb-1">Golongan Darah: {{ $post->GolDarah}}</p>
                <p class="mb-1">Alamat: {{ $post->Alamat}}</p>
                <p class="mb-1">Provinsi: {{ $post->Provinsi}}</p>
                <p class="mb-1">Kota: {{ $post->Kota}}</p>
                <p class="mb-1">Kecamatan: {{ $post->Kecamatan}}</p>
                <p class="mb-1">Sekolah: {{ $post->Sekolah}}</p>
                <p class="mb-1">Lokasi Ujian: {{ $post->LokasiUjian}}</p>
            </div>
        </div>
    </div>
@endsection