<form action="{{ @route('spp.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Tahun SPP</label>
        <input type="number" name="tahun" class="form-control @error('tahun')is-invalid  @enderror form-input"
            placeholder="Masukkan Tahun SPP Anda">

        @error('tahun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
    <div class="form-group">
        <label>Nominal SPP</label>
        <input type="number" name="nominal" class="form-control @error('nominal')is-invalid @enderror form-input"
            placeholder="Masukkan Nominal SSP Anda">

        @error('nominal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="modal-footer px-3">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
            class="btn  btn-success">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
</form>
