@extends('layouts.app')
@section('title', 'Data Peserta Pelatihan')

@section('content')


<div class="table-responsive">

    <table class="table datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Angkatan</th>
                <th>Jurusan</th>
                <th>Nama Lengkap</th>
                {{-- <th>NIK</th>
                <th>Kartu Keluarga</th> --}}
                <th>Jenis Kelamin</th>
                {{-- <th>Tempat Lahir</th> --}}
                <th>Tanggal Lahir</th>
                <th>Pendidikan Terakhir</th>
                {{-- <th>Nama Sekolah</th>
                <th>Program Studi</th> --}}
                <th>Nomor HP</th>
                <th>Email</th>
                {{-- <th>Aktivitas Saat Ini</th> --}}
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ( $pesertas as $item )
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->gelombangs->nama_gelombang }}</td>
                <td>{{ $item->jurusan->nama_jurusan }}</td>
                <td>{{ $item->nama_lengkap}}</td>
                {{-- <td>{{ $item->nik }}</td>
                <td>{{ $item->kartu_keluarga }}</td> --}}
                <td>{{ $item->jenis_kelamin }}</td>
                {{-- <td>{{ $item->tempat_lahir }}</td> --}}
                <td>{{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                <td>{{ $item->pendidikan_terakhir }}</td>
                {{-- <td>{{ $item->nama_sekolah }}</td>
                <td>{{ $item->kejuruan }}</td> --}}
                <td>{{ $item->nomor_hp }}</td>
                <td>{{ $item->email }}</td>
                {{-- <td>{{ $item->aktivitas_saat_ini }}</td> --}}
                <td>
                    @if ($item->status == 0)
                    <span class="badge text-bg-warning"><i class="bi bi-exclamation-triangle me-1"></i> Belum Diverifikasi</span>
                    @elseif ($item->status == 1)
                    <span class="badge text-bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Tidak Lolos</span>
                    @elseif ($item->status == 2)
                    <span class="badge text-bg-success"><i class="bi bi-check-circle me-1"></i> Lolos Administrasi</span>
                    @endif
                </td>
                <td><a href="{{route('peserta.edit', $item->id)}}" class="btn btn-success btn-xs">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
