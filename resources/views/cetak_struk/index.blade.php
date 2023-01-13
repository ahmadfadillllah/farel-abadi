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
                        <h4 class="card-title">Struk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>ID Nota</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Pembeli</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($struk as $p)
                                    <tr>
                                        <td>TRX{{ $p->id }}FRL</td>
                                        <td>{{ $p->tanggal_keluar }}</td>
                                        <td>{{ $p->nama_pembeli }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td><button type="button" class="btn btn-rounded btn-warning"><span
                                            class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                        </span>Download</button></td>
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
