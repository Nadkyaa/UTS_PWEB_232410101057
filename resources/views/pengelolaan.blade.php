@extends('layouts.app')

@section('content')
<div class="pengelolaan-container">
    <h2>Pengelolaan Data Siswa</h2>
    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

     @if (session('error'))
        <div class="alert error">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-add-siswa">
        <h3>Tambah Siswa Baru</h3>
        <form action="{{ route('pengelolaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" value="{{ old('nis') }}" required>
                 @error('nis') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                 <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" required>
                 @error('kelas') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn-submit">Tambah Siswa</button>
        </form>
    </div>

    <hr>
    <table class="data-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataSiswa as $key => $siswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $siswa['nama'] }}</td>
                    <td>{{ $siswa['nis'] }}</td>
                    <td>{{ $siswa['kelas'] }}</td>
                    <td>

                        <a href="{{ route('pengelolaan.edit', $key) }}" class="btn-action btn-edit">Edit</a>

                        <form action="{{ route('pengelolaan.destroy', $key) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
