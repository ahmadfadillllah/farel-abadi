@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('notification.index')
                <div class="card mt-3">
                    <div class="card-header">
                        {{ $pengeluaran->tanggal_keluar }}
                        <span class="float-right">
                            <button type="button" class="btn btn-rounded btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#addPemesanan" style="float: right;">Tambah</button>
                            @include('pemesanan.modal.insert')
                        </span>
                </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <h6>Dari:</h6>
                                <div> <strong>{{ Auth::user()->name }}</strong> </div>
                                <div>Email: {{ Auth::user()->email }}</div>
                                <div>No. HP: {{ Auth::user()->no_hp }}</div>
                            </div>
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <h6>Untuk:</h6>
                                <div> <strong>{{ $pengeluaran->nama_pembeli }}</strong> </div>
                                <div>No. HP: {{ $pengeluaran->no_hp }}</div>
                                <div>Alamat: {{ $pengeluaran->alamat }}</div>
                            </div>
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                <div class="row align-items-center">
                                    <div class="col-sm-12">
                                        <div class="brand-logo mb-3">
                                            <img class="logo-abbr me-2" src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo.png" alt="">
                                            <img class="logo-compact" src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo-text.png" alt="">
                                        </div>
                                        <span>Silahkan bayar sebesar: <strong class="d-block">@if ($total == 1){{ $total = 0 }}@else @currency($total)@endif</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th>Banyaknya</th>
                                        <th class="right">Harga</th>
                                        <th class="right">Total</th>
                                        <th class="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $p)
                                    <tr>
                                        <td class="center">{{ $loop->iteration }}</td>
                                        <td class="left strong">{{ $p->hasillaut->nama }}</td>
                                        <td class="left">{{ $p->banyaknya }}</td>
                                        <td class="right">@currency($p->harga)</td>
                                        <td class="right">@currency($p->total)</td>
                                        <td class="center">
                                            <button href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#destroyPemesanan{{ $p->id }}"><i class="fas fa-trash-alt"></i></button>
                                            @include('pemesanan.modal.destroy')</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Total Keseluruhan</strong></td>
                                            <td class="right"><strong>@if ($total == 1){{ $total = 0 }}@else @currency($total)@endif</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($total > 1)
                        <button id="pay-button" type="submit" class="btn btn-rounded btn-primary"><span
                            class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i>
                        </span>Bayar Non Tunai</button>
                        <button  class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tunaiPemesanan{{ $p->id }}"><span
                            class="btn-icon-start text-info"><i class="fa fa-shopping-cart"></i>
                        </span>Bayar Tunai</button>
                        @include('pemesanan.modal.tunai')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTIO  N_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
            let dataId = @json($pengeluaranById);
            console.log(dataId);
            var status = "Success"
            var data = { status: status,idPemesanan :dataId };
            console.log(data);
            var dataType = "json";
            var headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            $.ajax({
                type: "POST",
                url: '{{ route('pemesanan.success') }}',
                data: data,
                headers: headers,
                success: function(data, status) {
                    var data = data;
                    Swal.fire(
                    'Sukses',
                    'Pembayaran berhasil, silahkan cek status nota anda',
                    'success'
                    )
                // console.log(data);
                window.location = "{{ route('pengeluaran.index') }}";
                },
                dataType: dataType
            });

        },
        onPending: function(result){
          /* You may add your own implementation here */
        //   alert("wating your payment!"); console.log(result);
        Swal.fire(
                'Upps!',
                'Pembayaran dipending',
                'info'
                )
        },
        onError: function(result){
          /* You may add your own implementation here */
        //   alert("payment failed!"); console.log(result);
          Swal.fire(
                'Gagal',
                'Pembayaran gagal',
                'warning'
                )
        },
        onClose: function(){
            let dataId = @json($pengeluaranById);
            console.log(dataId);
            var status = "Ditunda"
            var data = { status: status,idPemesanan :dataId };
            console.log(data);
            var dataType = "json";
            var headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            $.ajax({
                type: "POST",
                url: '{{ route('pemesanan.ditunda') }}',
                data: data,
                headers: headers,
                success: function(data, status) {
                    var data = data;
                    Swal.fire(
                    'Info',
                    'Pembayaran Ditunda, mohon untuk melunasi secepatnya',
                    'info'
                    )
                // console.log(data);
                window.location = "{{ route('pengeluaran.index') }}";
                },
                dataType: dataType
            });
        }
      })
    });
</script>
@include('dashboard.layout.footer')
