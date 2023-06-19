@extends("parts.main")

@section("fillHead")
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section("fillBody")
<div class="row">
  <div class="col">
    <main class="form-register m-auto">
      <div class="d-flex flex-column justify-content-center">
        <img class="mb-3" src="img/FPPBKK.png" alt="FPPBKK Official Logo">
        <form action="/register" method="post">
          @csrf
          
          <h1 class="h1 mb-3 fw-bold">Tolong registrasi..</h1>
      
          <div class="form-floating">
            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" placeholder="." name="name" autofocus required value="{{ old("name") }}">
            <label for="name">Name</label>
            @error("name")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" class="form-control @error("username") is-invalid @enderror" id="username" placeholder="." name="username" required value="{{ old("username") }}">
            <label for="username">Username</label>
            @error("username")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" placeholder="." name="email" required value="{{ old("email") }}">
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

          <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
          <small class="d-block text-center mt-1">Sudah registrasi? Sign in <a href="/signin" class="text-decoration-none">di sini</a></small>
        </form>
      </div>
    </main>
  </div>
</div>
@endsection