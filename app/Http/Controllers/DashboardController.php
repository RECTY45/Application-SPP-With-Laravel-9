<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $petugas = User::all();

        return view('admin.dashboard.index',[
            'title' => "Dashboard",
           'petuags' => $petugas,
        ]);
    }
}
