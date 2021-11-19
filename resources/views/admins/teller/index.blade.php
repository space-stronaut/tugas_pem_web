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
        <a href="/teller/buat" class="btn btn-primary">Tambah Teller</a>
    </div>
    <div class="card-body">
        <table class="table" border="1">>
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($tellers as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td class="text-uppercase">
                            {{ $item->role }}
                        </td>
                        <td>
                            {{$item->email}}
                        </td>
                        <td>
                            <a href="/edit-teller/{{ $item->id }}" class="btn btn-success">Edit</a>
                            <a href="/hapus-teller/{{ $item->id }}" class="btn btn-danger">Hapus</a>
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