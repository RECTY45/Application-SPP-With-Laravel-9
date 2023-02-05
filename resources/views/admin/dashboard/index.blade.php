@extends('layouts.main')
@section('content')
<div class="container">
    <h2 class="main-title">Dashboard</h2>
    <div class="row stat-cards">
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon" style="background-color: rgba(74, 132, 240, 0.758)">
            <i class="icon user-3 " aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{ $petugas }}</p>
            <p class="stat-cards-info__title">Total Petugas</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon" style="background-color: rgba(74, 132, 240, 0.758)">
            <i class=" icon radio" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{ $siswa }}</p>
            <p class="stat-cards-info__title">Total Siswa</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon" style="background-color: rgba(74, 132, 240, 0.758)">
            <i class="icon home" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{ $kelas }}</p>
            <p class="stat-cards-info__title">Total Kelas</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon" style="background-color: rgba(74, 132, 240, 0.758)">
            <i class="icon money" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{ $spp }}</p>
            <p class="stat-cards-info__title">Total SPP</p>
          </div>
        </article>
      </div>
    </div>
</div>
@endsection
@push('script')
      <!-- Chart library -->
  <script src="{{ asset('assets/plugins/chart.min.js') }}"></script>
  <!-- Icons library -->
  <script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/script.js') }}"></script>

@endpush
