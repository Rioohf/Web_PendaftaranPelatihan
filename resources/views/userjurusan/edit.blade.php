@extends('layouts.app')
@section('title', 'Edit User Jurusan')
@section('content')

<form action="{{route('userjurusan.update', $users->id)}}" method="post">
    @csrf
    @method('PUT')
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Jurusan</label>
            </div>
            <div class="col-sm-5">
                <select class="form-control" name="id_jurusan" id="">
                    <option value="">Pilih Jurusan</option>
                   @foreach ($jurusan as $j)
                   <option value="{{$j->id}}" {{ $users->id_jurusan == $j->id ? 'selected' : '' }}>{{$j->nama_jurusan}}</option>
                   @endforeach
                </select>
            </div>
        </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Update Data</button>
          <a href="{{ route('userjurusan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
