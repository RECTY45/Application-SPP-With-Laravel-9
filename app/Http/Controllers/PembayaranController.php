<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use index;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Spp;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('admin.Entry_pembayaran.index',[
            'title' => 'Pembayaran',
            'name' => 'Data Pembayaran',
            'items' => $pembayaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = User::all();
        $spp = Spp::all();

        return view('admin.Entry_Pembayaran.create',[
            'title' => 'Pembayaran',
            'name' => 'Create Data Pembayaran',
            'dataPetugas' => $petugas,
            'dataSpp' => $spp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idPetugas = User::pluck('id')->toArray();
        $idSpp = Spp::pluck('id')->toArray();

        $validateData = $request->validate([
            'id_petugas' => ['required', Rule::in($idPetugas)],
            'id_spp' => ['required',Rule::in($idSpp)],
            'tgl_bayar' => ['required'],
            'bulan_dibayar' => ['required'],
            'tahun_dibayar' => ['required'],
            'jumlah_bayar' => ['required'],
            'nisn' => ['required','max:10'],
        ]);

        if($validateData){
            $check = Pembayaran::create($validateData);
        }

        if($check){
            return redirect(@route('pembayaran.index'))->with('success', 'Data Berhasil Di Tambah');
        }
        return back()->with('error', 'Data Gagal Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('admin.Entry_Pembayaran.update',[
            'title' => 'Pembayaran',
            'name' => 'Edit Data Pembayaran',
            'item' => $pembayaran,
            'dataPetugas' => User::all(),
            'dataSpp' => Spp::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $idPetugas = User::pluck('id')->toArray();
        $idSpp = Spp::pluck('id')->toArray();

        $validateData = $request->validate([
            'id_petugas' => ['required', Rule::in($idPetugas)],
            'id_spp' => ['required',Rule::in($idSpp)],
            'tgl_bayar' => ['required'],
            'bulan_dibayar' => ['required'],
            'tahun_dibayar' => ['required'],
            'jumlah_bayar' => ['required'],
            'nisn' => ['required','max:10'],

        ]);

        if($validateData){
            $check = $pembayaran->update($validateData);
        }

        if($check){
            return redirect(@route('pembayaran.index'))->with('success', 'Data Berhasil Di Edit');
        }
        return back()->with('error', 'Data Gagal Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $check = $pembayaran->delete();
            if($check){
                return back()->with('success', 'Data berhasil di hapus');
            }
            return back()->with('error', 'Data gagal di hapus');
    }
}
