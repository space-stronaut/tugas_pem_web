@extends('layouts.sb')

@section('content')
@if ($message = Session::get('success'))
    <div class="mb-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        Transaksi
        @if (Request::get('jenis'))
            <form action="{{ route('cetak-pdf') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis" value="{{ Request::get('jenis') }}">
                <input type="hidden" name="awal" value="{{ Request::get('awal') }}">
                <input type="hidden" name="akhir" value="{{ Request::get('akhir') }}">
                <button type="submit" class="btn btn-success">Download PDF</button>
            </form>
        @endif
        @if (Auth::user()->role == 'siswa')
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Transaksi</a>
        @endif
    </div>
    <div class="card-header">
        <form action="{{ route('transaksi.index') }}" method="get">
            @csrf
            <div class="form-group">
                <label for="">Jenis Pembayaran</label>
                <select name="jenis" class="form-control" id="">
                    <option value="">Pilih Jenis Pembayaran...</option>
                    @foreach ($pembayarans as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_pembayaran }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Periode</label>
            </div>
            <div class="form-group row align-items-center">
                {{-- <div class="col">
                    <label for="">Periode</label>
                </div> --}}
                <div class="col">
                    {{-- <label for="">Periode</label> --}}
                    <input type="date" name="awal" class="form-control">
                </div>
                S/d
                <div class="col">
                    <input type="date" name="akhir" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table" border="1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Pembayaran</th>
                <th scope="col">Jumlah Bayar</th>
                <th scope="col">Status</th>
                <th scope="col">Download</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($tagihans as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            {{ $item->user->name }}
                        </td>
                        <td>
                            {{$item->pembayaran->nama_pembayaran}}
                        </td>
                        <td>
                            {{$item->jumlah_bayar}}
                        </td>
                        <td>
                            <div class="badge badge-info text-uppercase">
                                {{$item->status}}
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('tagihan.download', $item->id) }}" class="btn btn-warning">Unduh Bukti Pembayaran</a>
                        </td>
                        <td class="d-flex">
                            @if ($item->status != 'menunggu konfirmasi')
                                <button class="btn btn-success" disabled>Selesai</button>
                            @elseif($item->status == 'menunggu konfirmasi' && Auth::user()->role == 'teller')
                                <form action="{{  route('tagihan.konfirmasi', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success ml-2">Konfirmasi</button>
                                </form>
                            @else
                                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Data Belum Ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection