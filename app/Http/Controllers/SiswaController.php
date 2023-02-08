<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.index',[
            'title' => 'Siswa',
            'name' => 'Data Siswa',
            'siswas' => $siswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.create',[
            'title' => 'Siswa',
            'name' => 'Create Data Siswa',
            'dataKelas' => $kelas,
            'dataSpp'=> $spp,
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
        $idkelas = Kelas::pluck('id')->toArray();
        $idSpp = Spp::pluck('id')->toArray();

        $validateData = $request->validate([
            'nisn' => ['required', 'unique:siswas,nisn','max:10' ],
            'nis' => ['required', 'unique:siswas,nis', 'max:8'],
            'nama' => ['required'],
            'id_kelas' => ['required', Rule::in($idkelas)],
            'jenis_kelamin' => ['required'],
            'id_spp' => ['required', Rule::in($idSpp)],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);

        if($validateData){
            $check = Siswa::create($validateData);
        }

        if($check){
            return redirect(route('siswa.index'))->with('success','Data Berhasil Di Tambah');
        }
        return back()->with('error','Data Gagal Di Edit');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.update',[
            'title' => 'Siswa',
            'name' => 'Edit Data Siswa',
            'item' => $siswa,
            'dataSpp' => Spp::all(),
            'dataKelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $idkelas = Kelas::pluck('id')->toArray();
        $idSpp = Kelas::pluck('id')->toArray();

        $validateData = $request->validate([
            'nisn' => ['required', 'max:10' ],
            'nis' => ['required',  'max:8'],
            'nama' => ['required'],
            'id_kelas' => ['required', Rule::in($idkelas)],
            'jenis_kelamin' => ['required'],
            'id_spp' => ['required', Rule::in($idSpp)],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);

        if($validateData){
            $check = $siswa->update($validateData);
        }

        if($check){
            return redirect(route('siswa.index'))->with('success','Data Berhasil Di Edit');
        }
        return back()->with('error','Data Gagal Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $check = $siswa->delete();
        if($check){
            return back()->with('success','Data berhasil di hapus');
        }
        return back()->with('error', 'Data gagal di hapus');
    }
}
