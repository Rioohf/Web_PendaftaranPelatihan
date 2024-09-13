@extends('layouts.app')
@section('title', 'Edit Jurusan')

@section('content')

<form action="{{route('jurusan.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Jurusan *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{ $edit->nama_jurusan }}" required type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <a href="{{ route('jurusan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
