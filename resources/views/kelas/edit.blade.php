@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Kelas
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" name="nama" value="{{ $kelas->nama }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection