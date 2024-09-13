@extends('layouts.app')
@section('title', 'Tambah Angkatan')

@section('content')

<form action="{{route('gelombang.store')}}" method="post">
    @csrf

    @if (session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
    @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Angkatan *</label>
        </div>
        <div class="col-sm-5">
            <input required type="text" class="form-control" name="nama_gelombang" placeholder="Nama Angkatan">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <a href="{{ route('gelombang.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
