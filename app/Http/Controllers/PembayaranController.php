<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use index;
use Alert;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Spp;
use App\Models\Kelas;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $month;

     public function __construct()
     {
         $this->month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
     }

    public function transaksi()
    {
        $siswas = Siswa::orderBy("created_at", "desc")
        ->orderBy("updated_at", "desc")
        ->get();
        return view('admin.Entry_pembayaran.transaksi',[
                'title' => 'Pembayaran',
                'name' => 'Transaksi Pembayaran',
                'transaksi' => $siswas,
                'dataMonth' => $this->month,
        ]);
    }

    public function index()
    {
        $pembayaran = Pembayaran::orderBy("created_at", "desc")
        ->orderBy("updated_at", "desc")
        ->get();
        return view('admin.Entry_pembayaran.index',[
            'title' => 'Pembayaran',
            'name' => 'Kelola History Pembayaran',
            'items' => $pembayaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        $bulan = Pembayaran::all();

        return view('admin.Entry_Pembayaran.create',[
            'title' => 'Pembayaran',
            'name' => 'Transaksi Pembayaran',
            'dataSpp' => $spp,
            'level' => auth()->user(),
            'pembayaran' => $bulan,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'dataMonth' => $this->month,
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
        $idPetugas = Pembayaran::pluck('id');
        $idSpp = Spp::pluck('id');

        $validateData = $request->validate([
            'id_petugas' => ['required', Rule::in($idPetugas)],
            'id_spp' => ['required', Rule::in($idSpp)],
            'nisn' => ['required', 'max:10'],
            'tgl_bayar' => ['required', 'date'],
            'bulan_dibayar' => ['required', 'max:13', 'array'],
            'tahun_dibayar' => ['required', 'max:4'],
            'jumlah_bayar' => ['required'],
        ]);

        $existingPayments = Pembayaran::where('nisn', $validateData['nisn'])
            ->whereIn('bulan_dibayar', $validateData['bulan_dibayar'])
            ->get();

        if ($existingPayments->isNotEmpty()) {
         Alert::error('Cek bulan,bulan telah di bayar!');
            return back();
        }

        try {

            foreach ($validateData['bulan_dibayar'] as $bulan) {
                Pembayaran::create([
                    'id_petugas' => $validateData['id_petugas'],
                    'id_spp' => $validateData['id_spp'],
                    'nisn' => $validateData['nisn'],
                    'tgl_bayar' => $validateData['tgl_bayar'],
                    'bulan_dibayar' => $bulan,
                    'tahun_dibayar' => $validateData['tahun_dibayar'],
                    'jumlah_bayar' => $validateData['jumlah_bayar'],
                ]);
            }
            return redirect(route('pembayaran.transaksi'))->with('success', 'Data berhasil di tambah kan');
        } catch (Exception $e) {
            return back()->with('error', 'Data gagal di tambahkan');
        }
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
        // return view('admin.Entry_Pembayaran.update',[
        //     'title' => 'Pembayaran',
        //     'name' => 'Edit Data Pembayaran',
        //     'item' => $pembayaran,
        //     'dataPetugas' => User::all(),
        //     'dataSpp' => Spp::all(),
        // ]);
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
        // $idPetugas = User::pluck('id')->toArray();
        // $idSpp = Spp::pluck('id')->toArray();

        // $validateData = $request->validate([
        //     'id_petugas' => ['required', Rule::in($idPetugas)],
        //     'id_spp' => ['required',Rule::in($idSpp)],
        //     'tgl_bayar' => ['required'],
        //     'bulan_dibayar' => ['required'],
        //     'tahun_dibayar' => ['required'],
        //     'jumlah_bayar' => ['required'],
        //     'nisn' => ['required','max:10'],

        // ]);

        // if($validateData){
        //     $check = $pembayaran->update($validateData);
        // }

        // if($check){
        //     return redirect(@route('pembayaran.index'))->with('success', 'Data Berhasil Di Edit');
        // }
        // return back()->with('error', 'Data Gagal Di Edit');
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
