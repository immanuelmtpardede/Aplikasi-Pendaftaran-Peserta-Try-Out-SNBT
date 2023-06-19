@extends("dashboard.parts.main")

@section("fillBody")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
        <h1 class="h1">Pendaftaran TRY OUT SNBT</h1>
    </div>

    <div class="col-lg-12">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has("delete"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("delete") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @can("member")
        @if($banyakpPosts == 0)
        <a href="/dashboard/post/create" class="btn btn-primary mb-3">Daftar di sini</a>
        @endif
        @endcan

        @can("admin")
        <a href="/dashboard/post/create" class="btn btn-primary mb-3">Daftar di sini</a>
        @endcan

        <div class="d-flex justify-content-around align-content-center flex-wrap">
            @foreach($posts as $post)
            <div>
                @can("admin")
                <div class="position-absolute mt-3 mx-0">
                    <a href="/dashboard/post/{{ $post->slug }}/edit">
                        <p class="border-0 badge bbg-light btn btn-outline-light" style="color:black; font-size:30px;">Edit</p>
                    </a>
                </div>
                <div class="position-absolute mt-3 me-0">
                    <form action="/dashboard/post/{{ $post->slug }}" method="post">
                        @method("delete")
                        @csrf

                        <button class="border-0 btn btn-outline-light"><span data-feather="trash-2" style="stroke:red; width:25px; height:25px" onclick="return confirm('Apakah Anda yakin ingin menghapus data pendaftar ini? Kalau tidak, klik cancel.')"></button>
                    </form>
                </div>
                @endcan
                <div class="position-absolute">
                    @if($post->isVerified == 0)
                        <p class="bg-danger bg-gradient">☒ Belum diverifikasi</p>
                    @else
                        <p class="bg-success bg-gradient">☑ Sudah diverifikasi</p>
                    @endif
                </div>

                <a href="/dashboard/post/{{ $post->slug }}"><img src="{{ asset("storage/" . $post->FotoDiri) }}" style="width:300px; height:300px; object-fit:cover" class="btn px-0 py-0"></a>              
            </div>
            @endforeach
        </div>
    </div>
@endsection