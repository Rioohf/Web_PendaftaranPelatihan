@extends('layouts.app')
@section('title', 'Data Gelombang')

@section('content')

<div class="table-responsive">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('gelombang.create') }}" class="btn btn-primary btn-sm">Tambah Gelombang</a>
    </div>

    <table class="table datatable" id="basic-datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Gelombang</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_gelombang }}</td>
                    <td>
                            @if ($item->aktif == 0)
                            <span class="badge text-bg-danger">Tidak Aktif</span>
                            @elseif ($item->aktif == 1)
                            <span class="badge text-bg-success">Aktif</span>
                            @endif
                    </td>
                    <td>
                        <a href="{{ route('gelombang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('gelombang.destroy', $item->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

