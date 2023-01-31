@extends('layouts.main')
@include('partials.css')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="font-weight-bold" style="line-height: 10px">Data Petugas</p>
                                <p class="h2">Kelola Data Petugas</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body white-block">
                @if (session()->has('succes'))
                    <div class="alert-succes p-3 raunded">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert-error p-3 raunded">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table users-table-info" id="table">
                    <thead class="text-center">
                        <tr class="stat-cards-info__num">
                            <th>No</th>
                            <th>Nisn</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="users-table-info text-center">
                            <tr>
                                <td>1</td>
                                <td>012212121112</td>
                                <td>202-098</td>
                                <td>Zhaka Hidayat Yasir</td>
                                <td>XII</td>
                                <td>Pajjaiang No.9</td>
                                <td>083321131313</td>
                                <td>2023</td>
                                <td>8000000</td>
                                <td>
                                    <div class="form-control-icon d-flex">
                                        <a href="#" method="POST"
                                            class="bg-success border-0 mb-3 px-2 py-1 rounded mx-1"><i
                                                class="icon edit"></i></a>
                                        <form action="icon edit" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="border-0 bg-danger px-2 py-1 rounded mx-1"><i
                                                    class="icon delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
