@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="h2">Kelola Data Pembayaran</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/Data
                                    Pembayaran/{{ $name }}</p>
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
                <form class="sign-up-form form" action="{{ route('pembayaran.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <select name="id_petugas"
                                    class="form-control form-input @error('id_petugas')is-invalid @enderror">
                                    @if ($item->petugas->id)
                                        <option selected value="{{ $item->petugas->id }}">{{ $item->petugas->nama_petugas }}
                                        </option>
                                    @endif()
                                    <option value="">Pilih Petugas</option>
                                    @foreach ($dataPetugas as $petugas)
                                        @if (old('id_tugas') == $petugas->id)
                                            <option selected value="{{ $petugas->id }}">{{ $petugas->nama_petugas }}
                                            </option>
                                        @endif()
                                        <option value="{{ $petugas->id }}">{{ $petugas->nama_petugas }}</option>
                                    @endforeach
                                </select>
                                @error('id_petugas')
                                    <div class="invalid-feedbabck">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>SPP</label>
                                <select name="id_spp" class="form-control form-input @error('id_spp')is-invalid @enderror">
                                    @if ($item->spp->id)
                                        <option selected value="{{ $item->spp->id }}">{{ $item->spp->nominal }}</option>
                                    @endif()
                                    <option value="">Nominal Spp</option>
                                    @foreach ($dataSpp as $spp)
                                        @if (old('id_spp') == $spp->id)
                                            <option selected value="{{ $spp->id }}">Rp. {{ $spp->nominal }}</option>
                                        @endif
                                        <option value="{{ $spp->id }}">Rp. {{ $spp->nominal }}</option>
                                    @endforeach
                                </select>
                                @error('id_spp')
                                    <div class="invalid-feedbabck">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Bayar</label>
                                <input value="{{ $item->tgl_bayar }}" type="date" name="tgl_bayar"
                                    class="form-control form-input @error('tgl_bayar')is-invalid @enderror"
                                    placeholder="Masukkan Tanggal Bayar Anda">
                                @error('tgl_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tahun Dibayar</label>
                                <input value="{{ $item->tahun_dibayar }}" type="number" name="tahun_dibayar"
                                    class="form-control form-input @error('tahun_dibayar')is-invalid @enderror"
                                    placeholder="Masukkan Tahun Bayar Anda">
                                @error('tahun_dibayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input value="{{ $item->nisn }}" type="number" name="nisn"
                                    class="form-control form-input @error('nisn')is-invalid @enderror"
                                    placeholder="Masukkan NISN Anda">
                                @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Bulan Dibayar</label>
                                <input value="{{ $item->bulan_dibayar }}" type="number" name="bulan_dibayar"
                                    class="form-control form-input @error('bulan_dibayar')is-invalid @enderror"
                                    placeholder="Masukkan Bulan Bayar Anda">
                                @error('bulan_dibayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jumlah Bayar</label>
                                <input value="{{ $item->jumlah_bayar }}" type="number" name="jumlah_bayar"
                                    class="form-control form-input @error('jumlah_bayar')is-invalid @enderror"
                                    placeholder="Masukkan Bulan Bayar Anda">
                                @error('jumlah_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group px-3">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-success">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
