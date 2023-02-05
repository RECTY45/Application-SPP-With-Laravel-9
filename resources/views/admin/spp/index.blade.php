@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="h2">Kelola Data SPP</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
        </div>
        <div class="d-flex justify-content-end">
           <button data-bs-toggle="modal" data-bs-target="#TambahData" type="button" class="btn btn-primary">Tambah Data</button>
        </div>
        <div class="card-body white-block">
            <div class="table-responsive">
                <table class="table users-table-info dt-table-hover"  id="dataTable">
                    <thead>
                        <tr class="stat-cards-info__num id">
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="users-table-info ">
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->nominal}}</td>
                                <td>
                                    <div class="form-control-icon d-flex">
                                        <button type="button"
                                            class="bg-success border-0 mb-3 px-2 py-1 rounded mx-1" ><i
                                            data-bs-toggle="modal" data-bs-target="#editData" class="icon edit"></i>                                    </button>

                                        <form action="{{ @route('spp.destroy',$item->id) }}" method="POST">
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
            @endsection
            <!-- Modal -->
            <div class="modal  fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                  <div class="modal-content ">
                    <div class="modal-header">
                      <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data SPP</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
                    </div>
                    <div class="modal-body">
                    @include('admin.spp.create')
                        </div>
                    </div>
                  </div>
                </div>
                </div>
            <!-- Modal -->
            <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                  <div class="modal-content ">
                    <div class="modal-header">
                      <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data SPP</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
                    </div>
                    <div class="modal-body">
                     @include('admin.spp.update')
                        </div>
                    </div>
                  </div>
                </div>
                </div>
        </div>
    </div>


