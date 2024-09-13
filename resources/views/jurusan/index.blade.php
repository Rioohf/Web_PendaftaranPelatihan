@extends('layouts.app')
@section('title', 'Data Jurusan')

@section('content')


<div class="table-responsive">

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div align="right" class="mb-3">
        <a href="{{route('jurusan.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ( $jurusan as $jur )
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $jur->nama_jurusan }}</td>
                <td>
                    <a href="{{route('jurusan.edit', $jur->id)}}" class="btn btn-success btn-xs">Edit</a>
                    {{-- <a href="{{route('level.destroy', $level->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <form class="d-inline" action="{{route('jurusan.destroy', $jur->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
