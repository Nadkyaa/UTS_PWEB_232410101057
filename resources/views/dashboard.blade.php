@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <h2 class="welcome-message">Selamat datang, {{ $username }}!</h2>

     <x-ornament>
        Anda Berada di Halaman Dashboard Sekolah
    </x-ornament>

    <div class="dashboard-summary">
        <div class="card">
            <h3>Jumlah Siswa</h3>
            <p class="count">150</p>
        </div>
        <div class="card">
            <h3>Jumlah Guru</h3>
            <p class="count">20</p>
        </div>
        <div class="card">
            <h3>Jumlah Kelas</h3>
            <p class="count">10</p>
    </div>

    <div class="dashboard-section">
        <h3>Aktivitas Terbaru</h3>
        <ul class="activity-list">
            <li>Siswa baru ditambahkan: Budi Santoso</li>
            <li>Kelas X MIPA 1 membuat jadwal baru</li>
            <li>Pengumuman baru dipublikasikan</li>
        </ul>
    </div>

     <div class="dashboard-section">
        <h3>Statistik Cepat</h3>
        <p>Rata-rata nilai siswa: 85.5</p>
        <p>Persentase kehadiran hari ini: 98%</p>
    </div>

</div>
@endsection
