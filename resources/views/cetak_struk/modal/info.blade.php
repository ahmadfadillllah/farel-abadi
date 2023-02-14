<div class="modal fade" id="cetakStruk{{ $p->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon
                    src="https://cdn.lordicon.com/tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>
                <div class="mt-4 pt-4">
                    <h4>Yakin ingin cetak struk tersebut?</h4>
                    <p class="text-muted">Silahkan mengecek printer terlebih dahulu apakah sudah terkoneksi?</p>
                    <!-- Toogle to second dialog -->
                    <button type="button" id="struk" value="{{ $p->id }}" onclick="showStruk({{ $p->id }}, '{{ $p->nama_pembeli }}')" class="btn btn-warning">Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

function showStruk(idPengeluaran, namaPengeluaran) {
        var pengeluaran_id = idPengeluaran;
        var namaPembeli = namaPengeluaran;
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('cetakstruk.show') }}",
            method: "GET",
            data: {pengeluaran_id: pengeluaran_id},
            success: function(data){
                console.log(data[0]);
                var printer = new Recta('1287972841', '1811');
                var date = new Date();
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var day = date.getDate();
                var month = date.getMonth();
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;

                printer.open().then(function () {
                printer
                    .align('center')
                    .text('==========================\n FAREL ABADI \n==========================')
                    .align('left')
                    .text('No. Invoice : TRX'+pengeluaran_id+'FRL')
                    .text('Tanggal : ' + day + ' ' + months[month] + ' ' + year)
                    .text('Nama : ' + namaPembeli)
                    .bold(true)
                    .text('\nTRANSAKSI:')
                    .bold(false)
                    // .text(data[0][1].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][1].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][2].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][2].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][3].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][3].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][4].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][4].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][5].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][5].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][6].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][6].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][7].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][7].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][8].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][8].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][9].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][9].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    // .text(data[0][10].hasillaut.nama + '       '+ convertToRupiah(data[0].total))
                    // .text(data[0][10].banyaknya + ' x ' + convertToRupiah(data[0].harga))
                    .align('center')
                    .text('--------------------------')
                    .align('left')
                    .bold(true)
                    .text('TOTAL BAYAR')
                    .text(convertToRupiah(data[1]))
                    .bold(false)
                    .align('center')
                    .text('\n**************************')
                    .text('Struk ini merupakan')
                    .text('bukti pembayaran yang sah')
                    .text('Terima kasih atas kunjungan anda\n')
                    .cut()
                    .print()
                })
                    Swal.fire(
                    'Success',
                    'Nota berhasil dicetak',
                    'success'
                    )
                setInterval(() => {
                window.location = "{{ route('cetakstruk.index') }}";
                }, 3000);
            }
        })
}

</script>



