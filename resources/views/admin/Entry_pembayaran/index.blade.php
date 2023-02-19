@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="md:h2 h4">History Pembayaran</p>
                                <p class="font-weight-bold small my-1" style="line-height: 10px"> {{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pembayaran.transaksi') }}" class="btn btn-primary md:btn-md btn-sm md:fs-5 fs-6">Tambah Pembayaran +</a>
                </div>
            </div>
            <div class="card-body white-block">
                <div class="table-responsive">
                    <table class="table users-table-info" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>NISN</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Bayar</th>
                                <th>Tahun Bayar</th>
                                <th>Nominal</th>
                                <th>Jumlah Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-info">
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->petugas->nama_petugas }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                    <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->tgl_bayar }}</td>
                                    <td>{{ $item->bulan_dibayar }}</td>
                                    <td>{{ $item->tahun_dibayar }}</td>
                                    <td>Rp.{{ number_format($item->spp->nominal) }}</td>
                                    <td>Rp.{{ number_format($item->jumlah_bayar) }}</td>
                                    <td>
                                        <div class="form-control-icon d-flex">
                                            <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="border-0 bg-danger px-2 py-1 rounded"
                                                    onclick="confirmDelete(event,this)"><i
                                                        class="icon delete mx-auto"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
