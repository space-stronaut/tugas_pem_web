@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Buat Siswa
        </div>
        <div class="card-body">
            <form action="/siswa" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">NIS</label>
                    <input type="number" name="nis" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="kelas_id" id="" class="form-control">
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection