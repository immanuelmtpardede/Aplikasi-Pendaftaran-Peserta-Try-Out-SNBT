<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1520px, initial-scale=1.0">
    <meta name="author" content="Immanuel Maruli Tua Pardede">
    <meta name="description" content="">

    <title>{{ $title }} | TRY OUT SNBT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
    @yield('fillHead')
  </head>
  <body>
    @include("dashboard.parts.header")
    <div class="container">
      <div class="row">
          @include("dashboard.parts.sidebar")

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              @yield('fillBody')
          </main>
      </div>
    </div>
    <script>
      function myFunction(){
        document.getElementById("formVerifikasi").submit();
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
  </body>
</html>