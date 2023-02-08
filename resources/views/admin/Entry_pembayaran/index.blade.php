@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="h2">Kelola Entri Pembayaran</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body white-block">
                <div class="table-responsive">
                    <table class="table users-table-info" id="dataTable">
                        <thead>
                            <tr class="stat-cards-info__num">
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>NISN</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Di Bayar</th>
                                <th>Tahun Di Bayar</th>
                                <th>Nominal</th>
                                <th>Jumlah Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-info">
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->petugas->nama_petugas}}</td>
                                    <td>{{ $item->siswa->nama}}</td>
                                    <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                    <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->tgl_bayar }}</td>
                                    <td>{{ $item->bulan_dibayar }}</td>
                                    <td>{{ $item->tahun_dibayar }}</td>
                                    <td>{{ $item->spp->nominal}}</td>
                                    <td>{{ $item->jumlah_bayar }}</td>
                                    <td>
                                        <div class="form-control-icon d-flex">
                                            <a href="{{ route('pembayaran.edit', $item->id) }}" method="POST"
                                                class="bg-success border-0 mb-3 px-2 py-1 rounded mx-1"><i
                                                    class="icon edit"></i></a>
                                            <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="border-0 bg-danger px-2 py-1 rounded mx-1"
                                                    onclick="confirmDelete(event,this)"><i class="icon delete"></i></button>
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
