@extends('layouts.app')
@section('title', 'Tambah User Jurusan')
@section('content')

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('userjurusan.store') }}">
        @csrf

        @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        {{-- Input Select User --}}
        <div class="form-group">
          <label for="nama_lengkap">User</label>
          <select class="form-control" name="id_user" id="userSelect">
            <option value="">Pilih User</option>
            @foreach ($user as $item)
              <option value="{{ $item->id }}" data-level="{{ $item->levels->nama_level }}">
                {{ $item->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Input Select Jurusan --}}
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" name="id_jurusan" id="">
              <option value="">Pilih Jurusan</option>
              @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
              @endforeach
            </select>
        </div>

        {{-- Input Select Level --}}
        <div class="form-group">
          <label for="level">Level</label>
          <select class="form-control" name="id_level" id="levelSelect" readonly>
            <option value="">Pilih Level</option>
            <option value="3">PIC</option>
            <option value="4">Instruktur</option>
          </select>
        </div>

        <a href="{{ route('userjurusan.index') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const userSelect = document.getElementById('userSelect');
      const levelSelect = document.getElementById('levelSelect');

      // Listener for user select change
      userSelect.addEventListener('change', function() {
        const selectedOption = userSelect.options[userSelect.selectedIndex];
        const userLevel = selectedOption.getAttribute('data-level');

        // Clear current selection in level select
        levelSelect.value = '';

        if (userLevel === 'Instruktur') {
          levelSelect.value = '4';  // Set to Instruktur
        } else if (userLevel === 'PIC') {
          levelSelect.value = '3';  // Set to PIC
        }
      });
    });
  </script>

@endsection
