<form method="POST" id="editForm">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Tahun SPP</label>
        <input value="{{ $item->tahun }}" type="number" name="tahun" id="edit_tahun"
            class="form-control @error('tahun')is-invalid  @enderror form-input" placeholder="Masukkan Nama Kelas Anda">

        @error('tahun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Nominal SPP</label>
        <input value="{{ $item->nominal }}" type="number" name="nominal" id="edit_nominal"
            class="form-control @error('nominal')is-invalid @enderror form-input"
            placeholder="Masukkan Nominal SPP Anda">
        @error('nominal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="modal-footer px-3">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
            class="btn btn-success">Batal</button>
        <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
</form>
