@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="md:h2 h4">Kelola Entri Pembayaran</p>
                                <p class="font-weight-bold small" style="line-height: 10px">Kelola History
                                    Pembayaran/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body white-block px-0 mx-0">
                <div class=" sign-up-form mx-0 px-0">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="pb-1 fs-6">Data Siswa</h5>
                            <p class="pb-3 small">Data siswa yang ingin membayar</p>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control " name="" value="{{ $siswa->nama }}"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label>NISN</label>
                                <input type="number" name="" value="{{ $siswa->nisn }}" class="form-control"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="" class="form-control"
                                    value="{{ $siswa->kelas->nama_kelas }}" disabled>
                            </div>
                            <form action="{{ route('pembayaran.store') }}" method="POST">
                                @csrf
                                <label>*Pilih Bulanan :</label>
                                <div class="form-group" style="color: black">
                                    <select class="js-example-basic-multiple form-control"name="bulan_dibayar[]"
                                        multiple="multiple">
                                        @foreach ($dataMonth as $month)
                                            <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="id_petugas" value="{{ $level->id }}">
                                <input type="hidden" name="id_spp" value="{{ $siswa->spp->id }}" readonly>
                                <input type="hidden" name="tgl_bayar" value="{{ date('Y-m-d') }}" readonly>

                                <input type="hidden" name="tahun_dibayar" value="{{ $siswa->spp->tahun }}" readonly>
                                <input type="hidden" name="jumlah_bayar" value="{{ $siswa->spp->nominal }}" readonly>
                                <input type="hidden" name="nisn" value="{{ $siswa->nisn }}" readonly>
                                <div class="mt-3 mb-5">
                                    <button type="submit" class="btn btn-success xl:btn-lg md:btn-lg btn-sm">Rekam</button>
                                    <a href="{{ route('pembayaran.transaksi') }}"
                                        class="btn btn-primary xl:btn-lg md:btn-lg btn-sm">Batal</a>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-6 ">
                            <p class="md:h6 fs-6 ">*Catatan : Jumlah pembayaran SPP sebesar</p>
                            <h5 class="md:m-4 mr-1 my-3 fw-bold fs-4 mb-4">Rp.{{ number_format($siswa->spp->nominal) }}
                            </h5>
                            <div class="table-responsive">
                                <table class="table users-table-info md:fs-5 fs-6 h6">
                                    <thead class="md:fs-5 fs-6">
                                        <tr class=" md:fs-5 fs-6">
                                            <th class="md:fs-5 fs-6 fw-bold">Bulan Pembayaran</th>
                                            <th class="md:fs-5 fs-6 fw-bold">Transaksi Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="users-table-info">
                                        @foreach ($dataMonth as $bln)
                                            <tr>
                                                <td class=" md:fs-5 fs-6">
                                                    {{ $bln }}
                                                </td>
                                                <td class=" md:fs-5 fs-6">
                                                    @foreach ($siswa->pembayaran as $pembayaran)
                                                        @if ($pembayaran->bulan_dibayar == $bln)
                                                            <button type="submit"
                                                                class="btn btn-success  md:btn-md btn-sm md:fs-5 fs-6"
                                                                disabled>S.bayar</button>
                                                        @endif
                                                    @endforeach

                                                    @if (!$siswa->pembayaran->contains('bulan_dibayar', $bln))
                                                        <button type="submit"
                                                            class="btn btn-danger md:btn-md btn-sm md:fs-5 fs-6">B.Bayar</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endpush
