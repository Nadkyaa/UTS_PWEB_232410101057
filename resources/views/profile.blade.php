@extends('layouts.app')

@section('content')
<div class="profile-container">
    <h2 class="profile-title">Profil Pengguna</h2>

    <x-ornament>
        Anda Dapat Mengubah Profil Anda
    </x-ornament>

    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

     @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="profile-header">
        <p class="profile-username">Username: <strong>{{ $username }}</strong></p>
    </div>

    <div class="profile-details">
        <h3>Ubah Detail Profil</h3>
        <form action="{{ route('profile.update', ['username' => $username]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_lengkap" class="detail-label">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="detail-value" value="{{ old('nama_lengkap', $userProfile['nama_lengkap'] ?? '') }}" required>
                @error('nama_lengkap') <span class="error-message">{{ $message }}</span> @enderror
            </div>
             <div class="form-group">
                <label for="peran" class="detail-label">Peran (Role):</label>
                <input type="text" id="peran" name="peran" class="detail-value" value="{{ old('peran', $userProfile['peran'] ?? '') }}" required>
                 @error('peran') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email" class="detail-label">Email:</label>
                <input type="email" id="email" name="email" class="detail-value" value="{{ old('email', $userProfile['email'] ?? '') }}" required>
                 @error('email') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nomor_telepon" class="detail-label">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="detail-value" value="{{ old('nomor_telepon', $userProfile['nomor_telepon'] ?? '') }}" required>
                 @error('nomor_telepon') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alamat" class="detail-label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="detail-value" required>{{ old('alamat', $userProfile['alamat'] ?? '') }}</textarea>
                 @error('alamat') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <a href="{{ route('profile.index', ['username' => $username]) }}" class="btn-cancel">Batal</a>

        </form>
    </div>

</div>
@endsection
