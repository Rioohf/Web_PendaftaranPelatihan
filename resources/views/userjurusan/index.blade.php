@extends('layouts.app')
@section('title', 'User Jurusan')
@section('content')

<div class="table-responsive">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif
    <div align="right" class="mb-3">
        <a href="{{route('userjurusan.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table datatable">
        <thead>
            <tr>
                <th>No</th>
              <th>Nama Lengkap</th>
              <th>Nama Level</th>
              <th>Jurusan</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($users as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$user->user->name }}</td>
                <td>{{ $user->level->nama_level}}</td>
                <td>{{$user->jurusan->nama_jurusan}}
            </td>
                <td>
                    <a href="{{route('userjurusan.edit', $user->id)}}" class="btn btn-success btn-xs">Edit</a>
                    {{-- <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <form class="d-inline" action="{{route('userjurusan.destroy', $user->id)}}" method="post">
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
