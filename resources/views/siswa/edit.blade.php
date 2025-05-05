@extends('layouts.app')

@section('content')
<div class="edit-siswa-container">
    <h2>Edit Data Siswa</h2>
     @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pengelolaan.update', $index) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa['nama']) }}" required>
             @error('nama') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa['nis']) }}" required>
             @error('nis') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $siswa['kelas']) }}" required>
             @error('kelas') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
        <a href="{{ route('pengelolaan.index') }}" class="btn-cancel">Batal</a>
    </form>
</div>
@endsection
