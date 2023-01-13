<div class="modal fade" id="addPengeluaran">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pengeluaran.insert') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Tanggal Keluar</label>
                            <input type="text" class="form-control" placeholder="Set Tanggal" id="min-date" name="tanggal_keluar" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">No. Handphone</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
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
