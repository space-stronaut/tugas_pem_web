@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Selamat Datang {{ Auth::user()->name }}
        </div>
        <div class="card-body">
            Website ini bertujuan untuk memudahkan siswa dalam membayar spp atau dsp secara online.
        </div>
    </div>
@endsection