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
                                <p class="h2">Kelola Data Siswa</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
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
                    <thead>
                        <tr class="stat-cards-info__num">
                            <th>No</th>
                            <th>Nisn</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="users-table-info">
                        @forelse($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                            <td>{{ $siswa->no_telp }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>
                                <div class="form-control-icon d-flex">
                                    <a href="#" method="POST"
                                        class="bg-success border-0 mb-3 px-2 py-1 rounded mx-1"><i
                                            class="icon edit"></i></a>
                                    <form action="{{ @route('siswa.destroy',$siswa->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="border-0 bg-danger px-2 py-1 rounded mx-1" onclick="confirmDelete(event,this)"><i
                                                class="icon delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div>
                            <span>Data Tidak Ada</span>
                        </div>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
