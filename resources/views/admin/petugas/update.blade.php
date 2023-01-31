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
                                <p class="h2">Kelola Data Petugas</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/Data Petugas/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
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
                <form class="sign-up-form form" action="{{ @route('petugas.update',$item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input value="{{ old('nama_petugas', $item->nama_petugas) }}" type="text" name="nama_petugas"
                                    class="form-control form-input @error('nama_petugas')is-invalid  @enderror"
                                    placeholder="Masukkan Nama Petugas Anda">
                                @error('nama_petugas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input value="{{old('username', $item->username) }}" type="text" name="username"
                                    class="form-control form-input @error('username')is-invalid @enderror"
                                    placeholder="Masukkan Username Anda">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select value="{{ $item->level }}" name="level" class="form-control form-input">
                                    @if ($item->level)
                                    <option selected value="{{ $item->level }}">{{ $item->level }}</option>
                                    @endif
                                    <option value="">Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">petugas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group px-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('petugas.index') }}" class="btn  btn-success">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
