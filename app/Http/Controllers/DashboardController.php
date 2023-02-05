<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $jmlpetugas = count( User::all());
        $jmlsiswa = count( Siswa::all());
        $jmlkelas = count(Kelas::all());
        $jmlspp = count(Spp::all());
        $jmlpembayarann = count(Pembayaran::all());

        return view('admin.dashboard.index',[
           'title' => "Dashboard",
           'petugas' => $jmlpetugas,
           'siswa' => $jmlsiswa,
           'kelas' => $jmlkelas,
           'spp' => $jmlspp,
           'pembayaran' => $jmlpembayarann,
        ]);
    }
}
