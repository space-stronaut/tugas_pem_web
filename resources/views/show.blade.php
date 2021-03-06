<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>SPP Smkn 1 Subang</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">SPP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="/">Beranda</a>
            <a class="nav-item nav-link active" href="{{ route('info.index') }}">Informasi <span class="sr-only">(current)</span></a>
          </div>
          <div class="ml-auto">
              <a href="{{ route('login') }}" class="btn btn-success">Masuk</a>
          </div>
        </div>
        </div>
      </nav>

      {{-- jumbotron --}}
      <div class="jumbotron">
          <div class="container">
            <h1 class="display-4">Author : {{ $item->user->name }}</h1>
            <hr class="my-4">
            <p>
                {{ $item->body }}
            </p>
            <p>
                Dilayangkan Tanggal : {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
            </p>
          </div>
      </div>

      {{-- information --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>