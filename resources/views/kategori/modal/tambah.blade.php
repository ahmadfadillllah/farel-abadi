<div class="modal fade" id="addKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('kategori.insert') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="col-lg-4 col-form-label" for="validationCustom01">Nama
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="validationCustom01" name="nama" placeholder=" Masukkan nama kategori" required>
                        <div class="invalid-feedback">
                            Masukkan nama kategori.
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
