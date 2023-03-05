@extends('layouts.main')
@section('content')
    @if (auth()->user()->level === 'admin')
        <div class="container">
            <h2 class="main-title">Dashboard</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="sidebar-user-img bg-primary" style="text-align: justify">
                            <i class="icon user-3 py-4 mx-auto" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $petugas }}</p>
                            <p class="stat-cards-info__title">Total Petugas</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="sidebar-user-img bg-primary">
                            <i class=" icon user-2 py-4  mx-auto" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $siswa }}</p>
                            <p class="stat-cards-info__title">Total Siswa</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="sidebar-user-img bg-primary ">
                            <i class="icon home py-4  mx-auto" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $kelas }}</p>
                            <p class="stat-cards-info__title">Total Kelas</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="sidebar-user-img bg-primary">
                            <i class="icon money py-4  mx-auto" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $spp }}</p>
                            <p class="stat-cards-info__title">Total SPP</p>
                        </div>
                    </article>
                </div>
                @foreach ($dataSpp as $data)
                    @php
                        $totalPembayaran = 0;
                        $totalTunggakan = $data->nominal * count($data->siswa) * 12;
                        foreach ($data->pembayaran as $pembayaran) {
                            $totalPembayaran += $pembayaran['jumlah_bayar'];
                            $totalTunggakan -= $pembayaran['jumlah_bayar'];
                            if ($totalTunggakan <= 0) {
                                $totalTunggakan = 0;
                            }
                        }
                    @endphp
                    <div class="col-md-6 col-xl-4">
                        <article class="card white-block px-0">
                            <div class="h6 pb-4">
                                <div class="px-2 d-flex justify-content-between">
                                    <p class="h5 bg-primary"
                                        style="border-radius: 5px; display: inline;
                        color: white; padding: 5px; text-align: center">
                                        Kelas {{ $data->level }}</p>
                                    <p class="h4">{{ number_format($data->nominal) }}</p>
                                </div>
                                <div class=" border border-3 logo-subtitle my-3"></div>
                                <div class="px-1 d-flex bd-highlight">
                                    <p class="stat-cards-info__title p-2 bd-highlight">Total Pembayaran : </p>
                                    <p class="h6 fw- ms-auto p-2 bd-highlight">Rp.{{ number_format($totalPembayaran) }}-</p>
                                </div>
                                <div class="px-1 d-flex bd-highlight">
                                    <p class="stat-cards-info__title p-2 bd-highlight">Total Tunggakan :</p>
                                    <p class="h6 fw- ms-auto p-2 bd-highlight">Rp.{{ number_format($totalTunggakan) }}-</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (auth()->user()->level === 'petugas')
        <div class="container">
            <h2 class="main-title">Dashboard</h2>
            <div class="row stat-cards">
                @foreach ($dataSpp as $data)
                    @php
                        $totalPembayaran = 0;
                        $totalTunggakan = $data->nominal * count($data->siswa) * 12;
                        foreach ($data->pembayaran as $pembayaran) {
                            $totalPembayaran += $pembayaran['jumlah_bayar'];
                            $totalTunggakan -= $pembayaran['jumlah_bayar'];
                            if ($totalTunggakan <= 0) {
                                $totalTunggakan = 0;
                            }
                        }
                    @endphp
                    <div class="col-md-6 col-xl-4">
                        <article class="card white-block px-0">
                            <div class="h6 pb-4">
                                <div class="px-2 d-flex justify-content-between">
                                    <p class="h5 bg-primary"
                                        style="border-radius: 5px; display: inline;
                        color: white; padding: 5px; text-align: center">
                                        Kelas {{ $data->level }}</p>
                                    <p class="h4">{{ number_format($data->nominal) }}</p>
                                </div>
                                <div class=" border border-3 logo-subtitle my-3"></div>
                                <div class="px-1 d-flex bd-highlight">
                                    <p class="stat-cards-info__title p-2 bd-highlight">Total Pembayaran : </p>
                                    <p class="h6 fw- ms-auto p-2 bd-highlight">Rp.{{ number_format($totalPembayaran) }}-
                                    </p>
                                </div>
                                <div class="px-1 d-flex bd-highlight">
                                    <p class="stat-cards-info__title p-2 bd-highlight">Total Tunggakan :</p>
                                    <p class="h6 fw- ms-auto p-2 bd-highlight">Rp.{{ number_format($totalTunggakan) }}-</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
