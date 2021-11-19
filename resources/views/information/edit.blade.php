@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Informasi
        </div>
        <div class="card-body">
            <form action="{{ route('information.update', $info->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="">Konten</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $info->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">File <small>*Opsional</small></label>
                    <input type="file" name="file" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection