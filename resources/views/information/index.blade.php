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
        <a href="{{ route('information.create') }}" class="btn btn-primary">Tambah Informasi</a>
    </div>
    <div class="card-body">
        <table class="table" border="1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Body</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($informations as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            {{ $item->user->name }}
                        </td>
                        <td>
                            {{$item->body}}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('information.edit', $item->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('information.destroy', $item->id) }}" method="POST">
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