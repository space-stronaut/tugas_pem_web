@extends('layouts.sb')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Selamat Datang, {{ Auth::user()->name }}
            </div>
        </div>
        <div class="row justify-content-between mt-4">
            <div class="card overflow-auto" style="width: 30rem;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        @if (Auth::user()->role == 'siswa')
                            Riwayat Transaksi-Mu
                        @else
                            Transaksi
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-success">Selengkapnya</a>
                    </div>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Download</th>
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
                                        {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('tagihan.download', $item->id) }}" class="btn btn-warning">Unduh Bukti Pembayaran</a>
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
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                    Profile
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="" value="{{ Auth::user()->name }}" readonly id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="" value="{{ Auth::user()->email }}" readonly id="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection