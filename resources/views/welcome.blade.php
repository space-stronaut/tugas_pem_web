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
            <a class="nav-item nav-link active" href="/">Beranda <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Informasi</a>
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
            <h1 class="display-4">Selamat Datang !</h1>
            <p class="lead">Aplikasi SPP ini diperuntukan supaya Siswa/Siswi SMKN 1 Subang dapat dengan mudah melakukan pembayaran IPP secara Online.</p>
            <hr class="my-4">
            <p class="lead">
              <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Ayo Bayar !</a>
            </p>
          </div>
      </div>

      {{-- information --}}

      <div class="container">
          <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                      Informasi
                  </div>
                  <div>
                      <a href="{{ route('info.index') }}" class="btn btn-success">Selengkapnya</a>
                  </div>
              </div>
              <div class="card-body">
                  @forelse ($infos as $item)
                      <div class="card" style="width: 18rem">
                        <div class="card-header">
                            Author : {{ $item->user->name }} (<span class="text-uppercase">{{ $item->user->role }}</span>)
                        </div>
                        <div class="card-body">
                            {{ \Illuminate\Support\Str::limit($item->body, 50, $end='...') }}
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('welcome.show', $item->id) }}" class="btn btn-success btn-block">Lihat Lebih Lanjut</a>
                        </div>
                        </div>
                  @empty
                      
                  @endforelse
              </div>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>