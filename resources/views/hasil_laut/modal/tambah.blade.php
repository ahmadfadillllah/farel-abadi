<div class="modal fade" id="addHasilLaut">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Hasil Laut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('hasillaut.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Kategori</label>
                            <select id="inputState" class="default-select form-control wide" name="kategori_id">
                                <option  value="" selected>Pilih salah satu...</option>
                                @foreach ($kategorii as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Status</label>
                            <select id="inputState" class="default-select form-control wide" name="status">
                                <option value="" selected>Pilih salah satu...</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
