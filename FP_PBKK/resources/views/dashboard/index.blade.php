@extends("dashboard.parts.main")

@section("fillBody")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
        <h1 class="h1">Selamat datang, {{ auth()->user()->name }}!</h1>
    </div>
@endsection