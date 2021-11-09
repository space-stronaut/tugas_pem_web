@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Transaksi
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="">Jenis Pembayaran</label>
                    <select name="pembayaran_id" id="" class="form-control">
                        <option>Pilih Pembayaran...</option>
                        @foreach ($pembayarans as $item)
                            <option value="{{ $item->id }}" {{ $transaksi->pembayaran_id == $item->id ? 'selected' : '' }}>{{ $item->nama_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" value="{{ $transaksi->jumlah_bayar }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" id="" class="form-control">
                </div>
                <input type="hidden" name="status" value="menunggu konfirmasi">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection