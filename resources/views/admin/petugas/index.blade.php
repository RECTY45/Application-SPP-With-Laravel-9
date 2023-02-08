@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="h2">Kelola Data Petugas</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body white-block">
                @if (session()->has('success'))
                    <div class="alert-success p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert-success p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table users-table-info dt-table-hover" id="dataTable">
                        <thead>
                            <tr class="stat-cards-info__num id">
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-info ">
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_petugas ?? '-' }}</td>
                                    <td>{{ $item->username ?? '-' }}</td>
                                    <td>
                                        <p
                                            style=" background-color: rgb(83, 132, 223);  border-radius: 15px; display: inline; color: white; padding: 5px; text-align: center">
                                            {{ $item->level }}</p>
                                    </td>
                                    <td>
                                        <div class="form-control-icon d-flex">
                                            <button type="submit" class="bg-success border-0 mb-3 px-2 py-1 rounded mx-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="icon edit"></i></button>

                                            <form action="{{ @route('petugas.destroy', $item->id) }}" method="POST">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Petugas</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"><svg
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>
                <div class="modal-body">
                    @include('admin.petugas.update')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
