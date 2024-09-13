@extends('layouts.app')
@section('title', 'Edit Angkatan')

@section('content')

<form action="{{route('gelombang.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Angkatan *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{ $edit->nama_gelombang }}" required type="text" class="form-control" name="nama_gelombang" placeholder="Nama Gelombang">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Status *</label>
        </div>
        <div class="col-sm-5">
            <input type="radio" class="status-radio" name="aktif" value="0"> Tidak Aktif
            <input type="radio" class="status-radio" name="aktif" value="1"> Aktif
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
