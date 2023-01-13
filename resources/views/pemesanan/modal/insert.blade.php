<div class="modal fade" id="addPemesanan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pemesanan.insert') }}" method="POST">
                @csrf
                <input type="text" name="pengeluaran_id" value="{{ $pengeluaran->id }}" class="form-control" hidden>
                <div class="modal-body">
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
                            <label class="form-label">Stok <sub>(kg)</sub></label>
                            <input type="text" id="stok" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Banyaknya <sub>(kg)</sub><sup style="color: red">*</sup></label>
                            <input type="text" id="banyaknya" name="banyaknya" onkeyup="sum()" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Harga<sup style="color: red">*</sup></label>
                            <input type="text" name="harga" id="rupiah" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="mb-12 col-md-12">
                            <label class="form-label">Sisa Stok <sub>(kg)</sub></label>
                            <input type="text" id="sisastok" name="sisa_stok" class="form-control" readonly>
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
					document.getElementById('stok').value = data['stok'];
				}
			})
		})
	})
</script>
<script>
    function sum() {
        var stok = document.getElementById('stok').value;
        var banyaknya = document.getElementById('banyaknya').value;
        var sisastok = parseFloat(stok) - parseFloat(banyaknya);
        var bulatan = sisastok.toFixed(2);
        if (!isNaN(sisastok)) {
            document.getElementById('sisastok').value = bulatan;
        }
    }
</script>
<script type="text/javascript">

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
</script>
