@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                @include('notification.index')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengeluaran</h4>
                        <button type="button" class="btn btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#addPengeluaran" style="float: right;"><span
                            class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i>
                        </span>Buat Nota</button>
                        @include('pengeluaran.modal.tambah')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>ID Nota</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Pembeli</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengeluaran as $p)
                                    <tr>
                                        <td><a @if ($p->status != 'Success')href="{{ route('pemesanan.index', $p->id) }}"@endif>TRX{{ $p->id }}FRL</a>
                                        </td>
                                        <td>{{ $p->tanggal_keluar }}</td>
                                        <td>{{ $p->nama_pembeli }}</td>
                                        <td>
                                            @if ($p->status == 'Belum Memasukkan Barang')
                                            <span class="badge light badge-info">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Ditunda')
                                            <span class="badge light badge-warning">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Pending')
                                            <span class="badge light badge-warning">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Success')
                                            <span class="badge light badge-success">{{ $p->status }}</span>
                                            @elseif ($p->status == 'Dibatalkan')
                                            <span class="badge light badge-danger">{{ $p->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
