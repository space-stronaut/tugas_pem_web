@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Jenis Pembayaran
        </div>
        <div class="card-body">
            <form action="{{ route('jenis-pembayaran.update', $pembayaran->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Nama Pembayaran</label>
                    <input type="text" name="nama_pembayaran" value="{{ $pembayaran->nama_pembayaran }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Bayar</label>
                    <input type="text" name="jumlah_pembayaran" value="{{ $pembayaran->jumlah_pembayaran }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection