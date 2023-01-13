<div class="modal fade" id="editKategori{{ $k->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('kategori.update', $k->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="col-lg-4 col-form-label" for="validationCustom01">Nama
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="validationCustom01" name="nama" value="{{ $k->nama }}" required>
                        <div class="invalid-feedback">
                            Masukkan nama kategori.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
