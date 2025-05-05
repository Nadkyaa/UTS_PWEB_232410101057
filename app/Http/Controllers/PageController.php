<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->input('username');
        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        return view('dashboard', compact('username'));
    }

    public function pengelolaan(Request $request)
    {
        $dataSiswa = $request->session()->get('dataSiswa', []);
        if (empty($dataSiswa)) {
             $dataSiswa = [
                ['nama' => 'Andi', 'nis' => '001', 'kelas' => 'X MIPA 1'],
                ['nama' => 'Budi', 'nis' => '002', 'kelas' => 'X MIPA 2'],
                ['nama' => 'Citra', 'nis' => '003', 'kelas' => 'XI IPS 1'],
                ['nama' => 'Dewi', 'nis' => '004', 'kelas' => 'XI IPS 2'],
            ];
            $request->session()->put('dataSiswa', $dataSiswa);
        }

        return view('pengelolaan', compact('dataSiswa'));
    }

    public function profile(Request $request)
    {
         $username = $request->query('username', 'GUEST');
         $userProfile = $request->session()->get('user_profile', [
            'nama_lengkap' => 'Masukkan Nama Lengkap',
            'peran' => 'Pilih Peran',
            'email' => 'Masukkan Alamat Email',
            'nomor_telepon' => 'Masukkan Nomor Telepon',
            'alamat' => 'Masukkan Alamat Lengkap',
         ]);
        return view('profile', compact('username', 'userProfile'));
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'peran' => 'required',
            'email' => 'required|email',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
        ]);
        $updatedProfile = [
            'nama_lengkap' => $request->nama_lengkap,
            'peran' => $request->peran,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ];
        $request->session()->put('user_profile', $updatedProfile);
        $username = $request->query('username', 'Tamu');
        return redirect()->route('profile.index', ['username' => $username])->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroySiswa(Request $request, $index)
{
    $dataSiswa = $request->session()->get('dataSiswa', []);
    if (!isset($dataSiswa[$index])) {
        return redirect()->route('pengelolaan.index')->with('error', 'Data siswa tidak ditemukan.');
    }
    unset($dataSiswa[$index]);
    $dataSiswa = array_values($dataSiswa);

    $request->session()->put('dataSiswa', $dataSiswa);

    return redirect()->route('pengelolaan.index')->with('success', 'Data siswa berhasil dihapus!');
}

    public function editSiswa(Request $request, $index)
{
    $dataSiswa = $request->session()->get('dataSiswa', []);
    if (!isset($dataSiswa[$index])) {
        return redirect()->route('pengelolaan.index')->with('error', 'Data siswa tidak ditemukan.');
    }
    $siswa = $dataSiswa[$index];
    return view('siswa.edit', compact('siswa', 'index'));
}

     public function updateSiswa(Request $request, $index)
 {
     $request->validate([
         'nama' => 'required',
         'nis' => 'required',
         'kelas' => 'required',
     ]);
     $dataSiswa = $request->session()->get('dataSiswa', []);
     if (!isset($dataSiswa[$index])) {
         return redirect()->route('pengelolaan.index')->with('error', 'Data siswa tidak ditemukan.');
     }
     foreach ($dataSiswa as $key => $siswa) {
         if ($key != $index && isset($siswa['nis']) && $siswa['nis'] === $request->nis) {
              return redirect()->back()->withInput()->withErrors(['nis' => 'NIS sudah ada.']);
         }
     }
     $dataSiswa[$index] = [
         'nama' => $request->nama,
         'nis' => $request->nis,
         'kelas' => $request->kelas,
     ];
     $request->session()->put('dataSiswa', $dataSiswa);
     return redirect()->route('pengelolaan.index')->with('success', 'Data siswa berhasil diupdate!');
 }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
        ]);
        $dataSiswa = $request->session()->get('dataSiswa', []);
        foreach ($dataSiswa as $siswa) {
            if ($siswa['nis'] === $request->nis) {
                return redirect()->back()->withInput()->withErrors(['nis' => 'NIS sudah ada.']);
            }
        }
        $dataSiswa[] = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ];
        $request->session()->put('dataSiswa', $dataSiswa);
        return redirect()->route('pengelolaan.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }
}
