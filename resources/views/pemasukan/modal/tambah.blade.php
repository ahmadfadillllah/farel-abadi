<div class="modal fade" id="addPemasukan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pemasukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pemasukan.insert') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="text" class="form-control" placeholder="Set Tanggal" id="min-date" name="tanggal_masuk" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Hasil Laut <sup style="color: red">*</sup></label>
                            <select id="hasillaut" class="default-select form-control wide" name="hasillaut_id" required>
                                <option  value="" selected>Pilih salah satu...</option>
                                @foreach ($hasillaut as $hl)
                                    <option value="{{ $hl->id }}">{{ $hl->kategori->nama }} | {{ $hl->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Stok Sebelumnya</label>
                            <input type="text" name="stok_sebelumnya" id="stok_sebelumnya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Nama Nelayan</label>
                            <input type="text" name="nama_nelayan" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" id="rupiah" class="form-control" required>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function(){
		$("#hasillaut").change(function(){
			var hasillaut_id = $(this).val()
			$.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: "{{ route('pemesanan.show_data') }}",
				method: "GET",
				data: {hasillaut_id: hasillaut_id},
				success: function(data){
                    console.log(data);
					document.getElementById('stok_sebelumnya').value = data['stok'];
				}
			})
		})
	})
</script>
<script>
    function sum() {
        var stok_sebelumnya = document.getElementById('stok_sebelumnya').value;
        var banyaknya = document.getElementById('banyaknya').value;
        var sisastok_sebelumnya = parseInt(stok_sebelumnya) - parseInt(banyaknya);
        if (!isNaN(sisastok_sebelumnya)) {
            document.getElementById('sisastok_sebelumnya').value = sisastok_sebelumnya;
        }
    }
</script>
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp');
    });

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
</script>
