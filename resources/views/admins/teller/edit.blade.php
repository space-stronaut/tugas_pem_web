@extends('layouts.sb')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Teller
        </div>
        <div class="card-body">
            <form action="/update-teller/{{ $teller->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" value="{{ $teller->name }}" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" autocomplete="off" class="form-control" value="{{ $teller->email }}" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" autocomplete="off" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection