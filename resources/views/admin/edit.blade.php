@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Admin
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update', $admin->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection