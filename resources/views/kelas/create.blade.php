@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Buat Kelas
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" name="nama" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection