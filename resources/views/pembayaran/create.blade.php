@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Buat Jenis Pembayaran
        </div>
        <div class="card-body">
            <form action="{{ route('jenis-pembayaran.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Pembayaran</label>
                    <input type="text" name="nama_pembayaran" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Bayar</label>
                    <input type="text" name="jumlah_pembayaran" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection