<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::all();
        return view('admin.petugas.index',[
            'title' => 'Petugas',
            'name'  => 'Data Petugas',
            'items' => $petugas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create',[
            'title' => 'Tambah Petugas',
            'name' => 'Tambah Data Petugas',
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
        $validateData = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'nama_petugas' => ['required'],
            'level' => ['required']
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        if($validateData){
            $check = User::create($validateData);
        }

        if($check){
            return redirect(@route('petugas.index'))->with('success', 'Data berhasil di tambah');
        }
        return back()->with('error', 'Data gagal di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(User $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(User $petugas)
    {
        return view('admin.petugas.update',[
            'title' => 'Edit Petugas',
            'name'  => 'Edit Data Petugas',
            'item'=> $petugas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $petugas)
    {
        $validateData = $request->validate([
            'username' => ['required'],
            'nama_petugas' => ['required'],
            'level' => ['required'],
        ]);

        if($validateData){
            $check = $petugas->update($validateData);
        }

        if($check){
            return redirect(@route('petugas.index'))->with('success', 'Data berhasil di ubah');
        }
        return back()->with('error', 'Data gagal di ubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $petugas)
    {
        $check = $petugas->delete();
        if($check){
            return back()->with('success', 'Data berhasil di hapus!');
        }
        return back()->with('error','Data gagal di hapus!');
    }
}
