@extends('layouts.app')
@section('title', 'Edit Status')

@section('content')

<form method="POST" action="{{ route('peserta.update', $pesertas->id) }}">
    @csrf
    @method('PUT')

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

            <table class="table table-striped">
                <tr>
                    <th>Gelombang</th>
                    <td>{{ $pesertas->gelombangs->nama_gelombang }}</td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td>{{ $pesertas->jurusan->nama_jurusan }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $pesertas->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $pesertas->email }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $pesertas->nomor_hp }}</td>
                </tr>
                <tr>
                    <th>Kartu Keluarga</th>
                    <td>{{ $pesertas->kartu_keluarga }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $pesertas->nik }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $pesertas->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $pesertas->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ date('d-m-Y', strtotime($pesertas->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>{{ $pesertas->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <th>Nama Sekolah</th>
                    <td>{{ $pesertas->nama_sekolah }}</td>
                </tr>
                <tr>
                    <th>Kejuruan</th>
                    <td>{{ $pesertas->kejuruan }}</td>
                </tr>
                <tr>
                    <th>Aktivitas Saat Ini</th>
                    <td>{{ $pesertas->aktivitas_saat_ini }}</td>
                </tr>


            </table>

            <form action="{{ route('peserta.update', $pesertas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3" >
                    <label for="status">Status Peserta:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="1">Tidak Lolos</option>
                        <option value="2">Lolos Administrasi</option>
                    </select>
                </div>



            <a href="{{route('peserta.index')}}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary mx-3">Update Status</button>
        </form>
</form>

@endsection
