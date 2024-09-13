@extends('web.layouts.app')

@section('content1')
<form action="{{route('pendaftaran.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <main class="d-flex align-items-center">
    <div class="container mt-5">
        <div id="wizard">
          <section>
            <div class="href-target" id="intro"></div>
            <h1 class="package-name">PPKD Jakarta Pusat</h1>
            <p>
                Pusat Pelatihan Kerja Daerah (PPKD) Jakarta Pusat, di bawah Dinas Tenaga Kerja, Transmigrasi, dan Energi Provinsi DKI Jakarta, membuka pendaftaran untuk kegiatan pelatihan.
            </p>
            <strong>Pelatihan keterampilan kerja berbasis kompetensi PROGRAM REGULER terdiri dari 16 kejuruan:</strong>
            @foreach ( $jurusan as $item )
            <ul>
              <li>{{$item->nama_jurusan}}</li>
            </ul>
            @endforeach
          </section>

          <section>
           <h2 class="section-heading">Masukan Biodata Anda </h2>
           <p>Pelatihan keterampilan kerja berbasis kompetensi PROGRAM REGULER terdiri dari 16 kejuruan. Pelatihan ini akan diselenggarakan dalam berbagai bidang kejuruan. Untuk mendaftar, silakan isi formulir pendaftaran berikut.</p>
           <div class="form-group">
                <label for="jurusan">Jurusan *</label>
                <select name="id_jurusan" id="id_jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gelombang">Angkatan</label>
                <select name="id_gelombang" id="id_gelombang" class="form-control">
                    @foreach ($gelombang->where('aktif', 1) as $item)
                        <option value="{{ $item->id }}" selected>{{ $item->nama_gelombang }}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap *</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
                <label for="jenis-kelamin">Jenis Kelamin *</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir *</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir *</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="nik">NIK *</label>
            <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" required>
          </div>
          <div class="form-group">
            <label for="kartukeluarga">Kartu Keluarga *</label>
            <input type="text" name="kartu_keluarga" id="kartu_keluarga" class="form-control" placeholder="Kartu Keluarga" required>
          </div>
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="nomor_hp">Nomor HP *</label>
            <input type="tel" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="nomor hp" required>
          </div>
          </section>

          <section>
            <h2 class="section-heading mb-2">Masukan Detail Lainnya *</h2>
            <div class="form-group">
              <label for="pendidikan_terakhir">Pendidikan Terakhir *</label>
              <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control" placeholder="Pendidikan Terakhir" required>
            </div>
            <div class="form-group">
              <label for="nama_sekolah">Nama Sekolah *</label>
              <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="Nama Sekolah" required>
            </div>
            <div class="form-group">
              <label for="kejuruan">Program Studi *</label>
              <input type="text" name="kejuruan" id="kejuruan" class="form-control" placeholder="Program Studi" required>
            </div>
            <div class="form-group">
              <label for="aktivitas_saat_ini">Aktifitas Saat Ini *</label>
              <input type="text" name="aktivitas_saat_ini" id="aktivitas_saat_ini" class="form-control" placeholder="Aktivitas saat ini" required>
              <p>* Tidak boleh lebih dari 10 kata</p>
            </div>
            <div class="card-footer">
                <div align="right">
                    <button class="btn btn-success mb-3 submit-button" type="submit">Simpan</button>
                </div>
            </div>

          </section>
        </div>
    </div>
  </main>
</form>
@endsection
