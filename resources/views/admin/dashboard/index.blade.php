@extends('layouts.main')
@section('content')
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
            <div class="col-md-6 col-xl-4">
                <article class="card white-block px-0">
                    <div class="h6 pb-4">
                        <div class="px-2 d-flex justify-content-between">
                            <p class="stat-cards-info__title">Kelas X</p> <p class="">Rp.200,000</p>
                        </div>
                        <div class=" border border-3 logo-subtitle my-3"></div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Pembayaran :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Tunggakan  :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4">
                <article class="card white-block px-0">
                    <div class="h6 pb-4">
                        <div class="px-2 d-flex justify-content-between">
                            <p class="stat-cards-info__title">Kelas XI</p> <p class="">Rp.200,000</p>
                        </div>
                        <div class=" border border-3 logo-subtitle my-3"></div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Pembayaran :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Tunggakan  :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4">
                <article class="card white-block px-0">
                    <div class="h6 pb-4">
                        <div class="px-2 d-flex justify-content-between">
                            <p class="stat-cards-info__title">Kelas XII</p> <p class="">Rp.200,000</p>
                        </div>
                        <div class=" border border-3 logo-subtitle my-3"></div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Pembayaran :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                        <div class="px-1 d-flex bd-highlight">
                            <p class="stat-cards-info__title p-2 bd-highlight">Total Tunggakan  :</p><p class="h6 fw- ms-auto p-2 bd-highlight">Rp.200.000</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
