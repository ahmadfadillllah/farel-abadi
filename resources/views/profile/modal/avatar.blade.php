<div class="modal fade" id="changeAvatar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('profile.change_avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="col-lg-4 col-form-label" for="validationCustom01">Avatar
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-12">
                        <input type="file" class="form-control" id="validationCustom01" name="avatar" placeholder=" Masukkan avatar." required>
                        <div class="invalid-feedback">
                            Masukkan avatar.
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
