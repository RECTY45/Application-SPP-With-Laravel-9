<form action="{{ @route('petugas.update',$item->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="form-group" style="width: 330px">
                <label>Nama Petugas</label>
                <input value="{{ old('nama_petugas', $item->nama_petugas) }}" type="text" name="nama_petugas"
                    class="form-control form-input"
                    placeholder="Masukkan Nama Petugas Anda">
            </div>
            <div class="form-group" style="width: 330px">
                <label>Username</label>
                <input value="{{old('username', $item->username) }}" type="text" name="username"
                    class="form-control form-input"
                    placeholder="Masukkan Username Anda">
            </div>
            <div class="form-group" style="width: 330px">
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
    <div class="modal-footer px-3">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" class="btn  btn-success">Batal</button>
        <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
</form>
