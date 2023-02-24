@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="md:h2 h4">Kwitansi Pembayaran</p>
                                <p class="font-weight-bold small my-1" style="line-height: 10px"> {{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pembayaran.transaksi') }}"
                        class="btn btn-primary md:btn-md btn-sm md:fs-5 fs-6">Tambah Pembayaran +</a>
                </div>
            </div>
            <div class="card-body white-block">
                <div class="table-responsive">
                    <table class="table users-table-info text-center" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nis</th>
                                <th class="text-center">Tanggal Bayar</th>
                                <th class="text-center">Bulan Bayar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-info">
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td >
                                        <div class="form-control-icon d-flex justify-content-center bg-light rounded-4">
                                           <a href="{{ route('kwitansi',$item->nis) }}" class="border-0 px-2 py-1 h5 mb-1"><i
                                                    class="icon cetak mx-auto d-inline-block mb--1"></i></a>
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
