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
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
    </div>
    <div class="card-body">
        <table class="table" border="1">
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
                @forelse ($admins as $item)
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
                            <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <a href="/hapus-siswa/{{ $item->id }}" class="btn btn-danger">Hapus</a>
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