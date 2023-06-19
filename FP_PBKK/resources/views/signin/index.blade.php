@extends("parts.main")

@section("fillHead")
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section("fillBody")
<div class="row">
  <div class="col">
    <main class="form-signin m-auto">
      <div class="d-flex flex-column justify-content-center">
        <img class="mb-3" src="img/FPPBKK.png" alt="FPPBKK Official Logo">
        <form action="/signin" method="post">
          @csrf

          @if(session()->has("success"))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has("signinError"))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session("signinError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <h1 class="h1 mb-3 fw-bold">Tolong sign in..</h1>
          
          <div class="form-floating">
            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" placeholder="." name="email" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error("email")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error("password") is-invalid @enderror inputBottom" id="password" placeholder="." name="password" required>
            <label for="password">Password</label>
            @error("password")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <small class="d-block text-center">Belum registrasi? Registrasi <a href="/register" class="text-decoration-none">di sini</a></small>
        </form>
      </div>
    </main>
  </div>
</div>
@endsection