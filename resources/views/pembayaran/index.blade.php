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
    <div class="card-header">
        <a href="{{ route('jenis-pembayaran.create') }}" class="btn btn-primary">Tambah Jenis Pembayaran</a>
    </div>
    <div class="card-body">
        <table class="table" border="1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pembayaran</th>
                <th scope="col">Jumlah Bayar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($pembayarans as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            {{ $item->nama_pembayaran }}
                        </td>
                        <td>
                            {{$item->jumlah_pembayaran}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('jenis-pembayaran.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('jenis-pembayaran.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger ml-2">Hapus</button>
                            </form>
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